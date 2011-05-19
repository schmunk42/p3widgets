<?php

/**
 * This is the model class for table "p3_widgets".
 *
 * The followings are the available columns in table 'p3_widgets':
 * @property integer $id
 * @property string $alias
 * @property string $properties
 * @property integer $rank
 * @property string $containerId
 * @property string $moduleId
 * @property string $controllerId
 * @property string $actionName
 * @property string $requestParam
 * @property string $sessionParam
 */
class Widget extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Widgets the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'p3_widget';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alias', 'required'),
			array('rank', 'numerical', 'integerOnly'=>true),
			array('alias', 'length', 'max'=>255),
			array('containerId', 'length', 'max'=>64),
			array('moduleId, controllerId, actionName, requestParam, sessionParam', 'length', 'max'=>128),
			array('properties', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alias, properties, rank, containerId, moduleId, controllerId, actionName, requestParam, sessionParam', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alias' => 'Alias',
			'properties' => 'Properties',
			'rank' => 'Rank',
			'containerId' => 'Container',
			'moduleId' => 'Module',
			'controllerId' => 'Controller',
			'actionName' => 'Action Name',
			'requestParam' => 'Request Param',
			'sessionParam' => 'Session Param',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('properties',$this->properties,true);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('containerId',$this->containerId,true);
		$criteria->compare('moduleId',$this->moduleId,true);
		$criteria->compare('controllerId',$this->controllerId,true);
		$criteria->compare('actionName',$this->actionName,true);
		$criteria->compare('requestParam',$this->requestParam,true);
		$criteria->compare('sessionParam',$this->sessionParam,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}