<?php

/**
 * This is the model base class for the table "p3_widget_translation".
 *
 * Columns in table "p3_widget_translation" available as properties of the model:
 * @property integer $id
 * @property integer $p3_widget_id
 * @property string $status
 * @property string $language
 * @property string $properties_json
 * @property string $content_html
 * @property string $access_owner
 * @property string $access_read
 * @property string $access_update
 * @property string $access_delete
 * @property integer $copied_from_id
 * @property string $created_at
 * @property string $updated_at
 *
 * Relations of table "p3_widget_translation" available as properties of the model:
 * @property P3Widget $p3Widget
 */
abstract class BaseP3WidgetTranslation extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'p3_widget_translation';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('p3_widget_id, status, language, access_owner', 'required'),
                array('properties_json, content_html, access_read, access_update, access_delete, copied_from_id, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
                array('p3_widget_id, copied_from_id', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 32),
                array('language', 'length', 'max' => 8),
                array('access_owner', 'length', 'max' => 64),
                array('access_read, access_update, access_delete', 'length', 'max' => 256),
                array('properties_json, content_html, created_at, updated_at', 'safe'),
                array('id, p3_widget_id, status, language, properties_json, content_html, access_owner, access_read, access_update, access_delete, copied_from_id, created_at, updated_at', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->status;
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
            'p3Widget' => array(self::BELONGS_TO, 'P3Widget', 'p3_widget_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('P3WidgetsModule.model', 'ID'),
            'p3_widget_id' => Yii::t('P3WidgetsModule.model', 'P3 Widget'),
            'status' => Yii::t('P3WidgetsModule.model', 'Status'),
            'language' => Yii::t('P3WidgetsModule.model', 'Language'),
            'properties_json' => Yii::t('P3WidgetsModule.model', 'Properties Json'),
            'content_html' => Yii::t('P3WidgetsModule.model', 'Content Html'),
            'access_owner' => Yii::t('P3WidgetsModule.model', 'Access Owner'),
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
        $criteria->compare('t.p3_widget_id', $this->p3_widget_id);
        $criteria->compare('t.status', $this->status, true);
        $criteria->compare('t.language', $this->language, true);
        $criteria->compare('t.properties_json', $this->properties_json, true);
        $criteria->compare('t.content_html', $this->content_html, true);
        $criteria->compare('t.access_owner', $this->access_owner, true);
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
