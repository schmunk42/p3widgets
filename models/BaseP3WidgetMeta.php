<?php

/**
 * This is the model base class for the table "p3_widget_meta".
 * Columns in table "p3_widget_meta" available as properties of the model:
 * @property integer        $id
 * @property integer        $status
 * @property string         $type
 * @property string         $language
 * @property integer        $treeParent_id
 * @property integer        $treePosition
 * @property string         $begin
 * @property string         $end
 * @property string         $keywords
 * @property string         $customData
 * @property integer        $label
 * @property string         $owner
 * @property string         $checkAccessCreate
 * @property string         $checkAccessRead
 * @property string         $checkAccessUpdate
 * @property string         $checkAccessDelete
 * @property string         $createdAt
 * @property string         $createdBy
 * @property string         $modifiedAt
 * @property string         $modifiedBy
 * @property string         $guid
 * @property string         $ancestor_guid
 * @property string         $model
 * Relations of table "p3_widget_meta" available as properties of the model:
 * @property P3Widget       $id0
 * @property P3WidgetMeta   $treeParent
 * @property P3WidgetMeta[] $p3WidgetMetas
 */
abstract class BaseP3WidgetMeta extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'p3_widget_meta';
    }

    public function rules()
    {
        return array(
            array('id, createdAt', 'required'),
            array(
                'status, type, language, treeParent_id, treePosition, begin, end, keywords, customData, label, owner, checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete, createdBy, modifiedAt, modifiedBy, guid, ancestor_guid, model',
                'default',
                'setOnEmpty' => true,
                'value'      => null
            ),
            array('id, status, treeParent_id, treePosition, label', 'numerical', 'integerOnly' => true),
            array('type, owner, createdBy, modifiedBy, guid, ancestor_guid', 'length', 'max' => 64),
            array('language', 'length', 'max' => 8),
            array('checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete', 'length', 'max' => 256),
            array('model', 'length', 'max' => 128),
            array('begin, end, keywords, customData, modifiedAt', 'safe'),
            array(
                'id, status, type, language, treeParent_id, treePosition, begin, end, keywords, customData, label, owner, checkAccessCreate, checkAccessRead, checkAccessUpdate, checkAccessDelete, createdAt, createdBy, modifiedAt, modifiedBy, guid, ancestor_guid, model',
                'safe',
                'on' => 'search'
            ),
        );
    }

    public function relations()
    {
        return array(
            'id0'           => array(self::BELONGS_TO, 'P3Widget', 'id'),
            'treeParent'    => array(self::BELONGS_TO, 'P3WidgetMeta', 'treeParent_id'),
            'p3WidgetMetas' => array(self::HAS_MANY, 'P3WidgetMeta', 'treeParent_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id'                => Yii::t('P3WidgetsModule.crud', 'ID'),
            'status'            => Yii::t('P3WidgetsModule.crud', 'Status'),
            'type'              => Yii::t('P3WidgetsModule.crud', 'Type'),
            'language'          => Yii::t('P3WidgetsModule.crud', 'Language'),
            'treeParent_id'     => Yii::t('P3WidgetsModule.crud', 'Tree Parent'),
            'treePosition'      => Yii::t('P3WidgetsModule.crud', 'Tree Position'),
            'begin'             => Yii::t('P3WidgetsModule.crud', 'Begin'),
            'end'               => Yii::t('P3WidgetsModule.crud', 'End'),
            'keywords'          => Yii::t('P3WidgetsModule.crud', 'Keywords'),
            'customData'        => Yii::t('P3WidgetsModule.crud', 'Custom Data'),
            'label'             => Yii::t('P3WidgetsModule.crud', 'Label'),
            'owner'             => Yii::t('P3WidgetsModule.crud', 'Owner'),
            'checkAccessCreate' => Yii::t('P3WidgetsModule.crud', 'Check Access Create'),
            'checkAccessRead'   => Yii::t('P3WidgetsModule.crud', 'Check Access Read'),
            'checkAccessUpdate' => Yii::t('P3WidgetsModule.crud', 'Check Access Update'),
            'checkAccessDelete' => Yii::t('P3WidgetsModule.crud', 'Check Access Delete'),
            'createdAt'         => Yii::t('P3WidgetsModule.crud', 'Created At'),
            'createdBy'         => Yii::t('P3WidgetsModule.crud', 'Created By'),
            'modifiedAt'        => Yii::t('P3WidgetsModule.crud', 'Modified At'),
            'modifiedBy'        => Yii::t('P3WidgetsModule.crud', 'Modified By'),
            'guid'              => Yii::t('P3WidgetsModule.crud', 'GUID'),
            'ancestor_guid'     => Yii::t('P3WidgetsModule.crud', 'Ancestor GUID'),
            'model'             => Yii::t('P3WidgetsModule.crud', 'Model'),
        );
    }


    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.type', $this->type, true);
        $criteria->compare('t.language', $this->language, true);
        $criteria->compare('t.treeParent_id', $this->treeParent_id);
        $criteria->compare('t.treePosition', $this->treePosition);
        $criteria->compare('t.begin', $this->begin, true);
        $criteria->compare('t.end', $this->end, true);
        $criteria->compare('t.keywords', $this->keywords, true);
        $criteria->compare('t.customData', $this->customData, true);
        $criteria->compare('t.label', $this->label);
        $criteria->compare('t.owner', $this->owner, true);
        $criteria->compare('t.checkAccessCreate', $this->checkAccessCreate, true);
        $criteria->compare('t.checkAccessRead', $this->checkAccessRead, true);
        $criteria->compare('t.checkAccessUpdate', $this->checkAccessUpdate, true);
        $criteria->compare('t.checkAccessDelete', $this->checkAccessDelete, true);
        $criteria->compare('t.createdAt', $this->createdAt, true);
        $criteria->compare('t.createdBy', $this->createdBy, true);
        $criteria->compare('t.modifiedAt', $this->modifiedAt, true);
        $criteria->compare('t.modifiedBy', $this->modifiedBy, true);
        $criteria->compare('t.guid', $this->guid, true);
        $criteria->compare('t.ancestor_guid', $this->ancestor_guid, true);
        $criteria->compare('t.model', $this->model, true);

        return new CActiveDataProvider(get_class($this), array(
                                                              'criteria' => $criteria,
                                                         ));
    }

    public function get_label()
    {
        return '#' . $this->id;

    }

}
