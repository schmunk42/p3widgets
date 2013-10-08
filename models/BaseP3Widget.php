<?php

/**
 * This is the model base class for the table "p3_widget".
 *
 * Columns in table "p3_widget" available as properties of the model:
 * @property integer $id
 * @property string $name_id
 * @property string $status
 * @property string $default_properties_json
 * @property string $default_content_html
 * @property string $module_id
 * @property string $controller_id
 * @property string $action_name
 * @property string $request_param
 * @property string $session_param
 * @property string $container_id
 * @property integer $rank
 * @property string $alias
 * @property string $access_owner
 * @property string $access_domain
 * @property string $access_read
 * @property string $access_update
 * @property string $access_delete
 * @property integer $copied_from_id
 * @property string $created_at
 * @property string $updated_at
 *
 * Relations of table "p3_widget" available as properties of the model:
 * @property P3WidgetTranslation[] $p3WidgetTranslations
 */
abstract class BaseP3Widget extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'p3_widget';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, container_id, alias, access_owner, access_domain', 'required'),
                array('name_id, default_properties_json, default_content_html, module_id, controller_id, action_name, request_param, session_param, rank, access_read, access_update, access_delete, copied_from_id, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
                array('rank, copied_from_id', 'numerical', 'integerOnly' => true),
                array('name_id, access_owner', 'length', 'max' => 64),
                array('status', 'length', 'max' => 32),
                array('module_id, controller_id, action_name, request_param, session_param, container_id, alias', 'length', 'max' => 128),
                array('access_domain', 'length', 'max' => 8),
                array('access_read, access_update, access_delete', 'length', 'max' => 256),
                array('default_properties_json, default_content_html, created_at, updated_at', 'safe'),
                array('id, name_id, status, default_properties_json, default_content_html, module_id, controller_id, action_name, request_param, session_param, container_id, rank, alias, access_owner, access_domain, access_read, access_update, access_delete, copied_from_id, created_at, updated_at', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->name_id;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'p3WidgetTranslations' => array(self::HAS_MANY, 'P3WidgetTranslation', 'p3_widget_id', 'index'=>'language'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('P3WidgetsModule.model', 'ID'),
            'name_id' => Yii::t('P3WidgetsModule.model', 'Name'),
            'status' => Yii::t('P3WidgetsModule.model', 'Status'),
            'default_properties_json' => Yii::t('P3WidgetsModule.model', 'Default Properties Json'),
            'default_content_html' => Yii::t('P3WidgetsModule.model', 'Default Content Html'),
            'module_id' => Yii::t('P3WidgetsModule.model', 'Module'),
            'controller_id' => Yii::t('P3WidgetsModule.model', 'Controller'),
            'action_name' => Yii::t('P3WidgetsModule.model', 'Action Name'),
            'request_param' => Yii::t('P3WidgetsModule.model', 'Request Param'),
            'session_param' => Yii::t('P3WidgetsModule.model', 'Session Param'),
            'container_id' => Yii::t('P3WidgetsModule.model', 'Container'),
            'rank' => Yii::t('P3WidgetsModule.model', 'Rank'),
            'alias' => Yii::t('P3WidgetsModule.model', 'Alias'),
            'access_owner' => Yii::t('P3WidgetsModule.model', 'Access Owner'),
            'access_domain' => Yii::t('P3WidgetsModule.model', 'Access Domain'),
            'access_read' => Yii::t('P3WidgetsModule.model', 'Access Read'),
            'access_update' => Yii::t('P3WidgetsModule.model', 'Access Update'),
            'access_delete' => Yii::t('P3WidgetsModule.model', 'Access Delete'),
            'copied_from_id' => Yii::t('P3WidgetsModule.model', 'Copied From'),
            'created_at' => Yii::t('P3WidgetsModule.model', 'Created At'),
            'updated_at' => Yii::t('P3WidgetsModule.model', 'Updated At'),
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.name_id', $this->name_id, true);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.default_properties_json', $this->default_properties_json, true);
        $criteria->compare('t.default_content_html', $this->default_content_html, true);
        $criteria->compare('t.module_id', $this->module_id, true);
        $criteria->compare('t.controller_id', $this->controller_id, true);
        $criteria->compare('t.action_name', $this->action_name, true);
        $criteria->compare('t.request_param', $this->request_param, true);
        $criteria->compare('t.session_param', $this->session_param, true);
        $criteria->compare('t.container_id', $this->container_id, true);
        $criteria->compare('t.rank', $this->rank);
        $criteria->compare('t.alias', $this->alias, true);
        $criteria->compare('t.access_owner', $this->access_owner, true);
        $criteria->compare('t.access_domain', $this->access_domain, true);
        $criteria->compare('t.access_read', $this->access_read, true);
        $criteria->compare('t.access_update', $this->access_update, true);
        $criteria->compare('t.access_delete', $this->access_delete, true);
        $criteria->compare('t.copied_from_id', $this->copied_from_id);
        $criteria->compare('t.created_at', $this->created_at, true);
        $criteria->compare('t.updated_at', $this->updated_at, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}
