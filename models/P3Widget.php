<?php

// auto-loading
Yii::setPathOfAlias('P3Widget', dirname(__FILE__));
Yii::import('P3Widget.*');

class P3Widget extends BaseP3Widget
{

    /**
     * @var string default status
     */
    public $status = 'draft';

    private $_statusCssClassMap = array(
        'draft'      => 'default',
        'published'  => 'success',
        'overridden' => 'info',
        'archived'   => 'inverse'
    );

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return '#' . $this->id . ' ' . $this->alias . ' /' . $this->module_id . '/' . $this->controller_id . '/' . $this->action_name . '/' . $this->request_param . ' ' . $this->container_id . ':' . $this->rank;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                 'Access'           => array(
                     'class' => '\PhAccessBehavior'
                 ),
                 'EventBridge' => array(
                     'class'  => 'EventBridgeBehavior',
                 ),
                 'LoggableBehavior' => array(
                     'class'   => 'vendor.sammaye.auditrail2.behaviors.LoggableBehavior',
                     'ignored' => array(
                         'created_at',
                         'updated_at',
                     )
                 ),
                 'Status'           => array(
                     'class'       => 'vendor.yiiext.status-behavior.EStatusBehavior',
                     'statusField' => 'status'
                 ),
                 'Timestamp'        => array(
                     'class'               => 'zii.behaviors.CTimestampBehavior',
                     'createAttribute'     => 'created_at',
                     'updateAttribute'     => 'updated_at',
                     'setUpdateOnCreate'   => true,
                     'timestampExpression' => "date_format(date_create(),'Y-m-d H:i:s');",
                 ),
                 'Translatable'     => array(
                     'class'                 => 'vendor.mikehaertl.translatable.Translatable',
                     'translationRelation'   => 'p3WidgetTranslations',
                     'translationAttributes' => array(
                         'properties_json',
                         'content_html'
                     ),
                     'fallbackColumns'       => array(
                         'properties_json' => 'default_properties_json',
                         'content_html'    => 'default_content_html',
                     ),
                 ),
            )
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function getStatusCssClass()
    {
        if ($this->translationModel->hasStatus('published')) {
            $status = 'overridden';
        } else {
            $status = $this->status;
        }
        return $this->_statusCssClassMap[$status];
    }

    /**
     * @return array list of options
     */
    public static function optsStatus()
    {
        $model = P3Page::model();
        return array_combine($model->Status->statuses, $model->Status->statuses);
    }

    /**
     * @return array list of options

    public static function optsAccessOwner()
    {
    return self::model()->Access->getAccessOwner();
    }*/

    /**
     * @return array list of options
     */
    public static function optsAccessDomain()
    {
        return self::model()->Access->getAccessDomains();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessRead()
    {
        return self::model()->Access->getAccessRoles();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessUpdate()
    {
        return self::model()->Access->getAccessRoles();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessDelete()
    {
        return self::model()->Access->getAccessRoles();
    }
}
