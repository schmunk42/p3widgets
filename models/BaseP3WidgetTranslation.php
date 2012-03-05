<?php

/**
 * This is the model base class for the table "p3_widget_translation".
 *
 * Columns in table "p3_widget_translation" available as properties of the model:
 * @property integer $id
 * @property integer $p3_widget_id
 * @property string $language
 * @property string $properties
 * @property string $content
 *
 * Relations of table "p3_widget_translation" available as properties of the model:
 * @property P3Widget $p3Widget
 */
abstract class BaseP3WidgetTranslation extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'p3_widget_translation';
	}

	public function rules()
	{
		return array(
			array('p3_widget_id', 'required'),
			array('language, properties, content', 'default', 'setOnEmpty' => true, 'value' => null),
			array('p3_widget_id', 'numerical', 'integerOnly'=>true),
			array('language', 'length', 'max'=>8),
			array('properties, content', 'safe'),
			array('id, p3_widget_id, language, properties, content', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app', 'ID'),
			'p3_widget_id' => Yii::t('app', 'P3 Widget'),
			'language' => Yii::t('app', 'Language'),
			'properties' => Yii::t('app', 'Properties'),
			'content' => Yii::t('app', 'Content'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('p3_widget_id', $this->p3_widget_id);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('properties', $this->properties, true);
		$criteria->compare('content', $this->content, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->id;		
		
			}
	
}
