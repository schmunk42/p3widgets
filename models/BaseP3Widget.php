<?php

/**
 * This is the model base class for the table "p3_widget".
 *
 * Columns in table "p3_widget" available as properties of the model:
 * @property integer $id
 * @property string $alias
 * @property integer $rank
 * @property string $containerId
 * @property string $moduleId
 * @property string $controllerId
 * @property string $actionName
 * @property string $requestParam
 * @property string $sessionParam
 *
 * Relations of table "p3_widget" available as properties of the model:
 * @property P3WidgetMeta $p3WidgetMeta
 * @property P3WidgetTranslation[] $p3WidgetTranslations
 */
abstract class BaseP3Widget extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'p3_widget';
	}

	public function rules()
	{
		return array(
			array('alias, containerId', 'required'),
			array('rank, moduleId, controllerId, actionName, requestParam, sessionParam', 'default', 'setOnEmpty' => true, 'value' => ''),
			array('rank', 'numerical', 'integerOnly'=>true),
			array('alias, containerId, moduleId, controllerId, actionName, requestParam, sessionParam', 'length', 'max'=>128),
			array('id, alias, rank, containerId, moduleId, controllerId, actionName, requestParam, sessionParam', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'p3WidgetMeta' => array(self::HAS_ONE, 'P3WidgetMeta', 'id'),
			'p3WidgetTranslations' => array(self::HAS_MANY, 'P3WidgetTranslation', 'p3_widget_id'),
            'id0' => array(self::BELONGS_TO, 'P3Widget', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'alias' => Yii::t('app', 'Alias'),
			'rank' => Yii::t('app', 'Rank'),
			'containerId' => Yii::t('app', 'Container'),
			'moduleId' => Yii::t('app', 'Module'),
			'controllerId' => Yii::t('app', 'Controller'),
			'actionName' => Yii::t('app', 'Action Name'),
			'requestParam' => Yii::t('app', 'Request Param'),
			'sessionParam' => Yii::t('app', 'Session Param'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('rank', $this->rank);
		$criteria->compare('containerId', $this->containerId, true);
		$criteria->compare('moduleId', $this->moduleId, true);
		$criteria->compare('controllerId', $this->controllerId, true);
		$criteria->compare('actionName', $this->actionName, true);
		$criteria->compare('requestParam', $this->requestParam, true);
		$criteria->compare('sessionParam', $this->sessionParam, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function get_label()
	{
		return '#'.$this->id;

			}

}
