<?php

// auto-loading
Yii::setPathOfAlias('P3WidgetTranslation', dirname(__FILE__));
Yii::import('P3WidgetTranslation.*');

class P3WidgetTranslation extends BaseP3WidgetTranslation
{

    /**
     * @var string default status
     */
    public $status = 'draft';

    private $_statusCssClassMap = array(
        'new'         => 'default',
        'draft'       => 'default',
        'unpublished' => 'warning',
        'published'   => 'success',
        'archived'    => 'inverse'
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
        return $this->language;
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

        if ($this->hasStatus('published') && !$this->p3Widget->hasStatus('published')) {//!$this->p3Widget->hasStatus('published') && $this->hasStatus('published')) {
            $status = 'unpublished';
        } else {
            $status = ($this->isNewRecord) ? 'new' : $this->getAttribute('status');
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
    public static function optsLanguage()
    {
        $langs = Yii::app()->params['languages'];
        if (!is_array($langs)) {
            $langs = array(Yii::app()->language => Yii::app()->language);
        }
        return $langs;
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

    /**
     * @return array list of options
     */
    public static function optsAccessAppend()
    {
        return self::model()->Access->getAccessRoles();
    }
}
