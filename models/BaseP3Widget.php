<?php

/**
 * This is the model base class for the table "p3_widget".
 * Columns in table "p3_widget" available as properties of the model:
 * @property integer               $id
 * @property string                $alias
 * @property integer               $rank
 * @property string                $containerId
 * @property string                $moduleId
 * @property string                $controllerId
 * @property string                $actionName
 * @property string                $requestParam
 * @property string                $sessionParam
 * Relations of table "p3_widget" available as properties of the model:
 * @property P3WidgetMeta          $p3WidgetMeta
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
        return array(
            array('alias, containerId', 'required'),
            array(
                'rank, moduleId, controllerId, actionName, requestParam, sessionParam',
                'default',
                'setOnEmpty' => true,
                'value'      => ''
            ),
            array('rank', 'numerical', 'integerOnly' => true),
            array(
                'alias, containerId, moduleId, controllerId, actionName, requestParam, sessionParam',
                'length',
                'max' => 128
            ),
            array(
                'id, alias, rank, containerId, moduleId, controllerId, actionName, requestParam, sessionParam',
                'safe',
                'on' => 'search'
            ),
        );
    }

    public function relations()
    {
        return array(
            'p3WidgetMeta'         => array(self::HAS_ONE, 'P3WidgetMeta', 'id'),
            'p3WidgetTranslations' => array(self::HAS_MANY, 'P3WidgetTranslation', 'p3_widget_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id'           => Yii::t('P3WidgetsModule.crud', 'ID'),
            'alias'        => Yii::t('P3WidgetsModule.crud', 'Alias'),
            'rank'         => Yii::t('P3WidgetsModule.crud', 'Rank'),
            'containerId'  => Yii::t('P3WidgetsModule.crud', 'Container'),
            'moduleId'     => Yii::t('P3WidgetsModule.crud', 'Module'),
            'controllerId' => Yii::t('P3WidgetsModule.crud', 'Controller'),
            'actionName'   => Yii::t('P3WidgetsModule.crud', 'Action Name'),
            'requestParam' => Yii::t('P3WidgetsModule.crud', 'Request Param'),
            'sessionParam' => Yii::t('P3WidgetsModule.crud', 'Session Param'),
        );
    }


    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.alias', $this->alias, true);
        $criteria->compare('t.rank', $this->rank);
        $criteria->compare('t.containerId', $this->containerId, true);
        $criteria->compare('t.moduleId', $this->moduleId, true);
        $criteria->compare('t.controllerId', $this->controllerId, true);
        $criteria->compare('t.actionName', $this->actionName, true);
        $criteria->compare('t.requestParam', $this->requestParam, true);
        $criteria->compare('t.sessionParam', $this->sessionParam, true);

        return new CActiveDataProvider(get_class($this), array(
                                                              'criteria' => $criteria,
                                                         ));
    }


}
