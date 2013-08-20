<?php

// auto-loading fix
Yii::setPathOfAlias('P3WidgetTranslation', dirname(__FILE__));
Yii::import('P3WidgetTranslation.*');

class P3WidgetTranslation extends BaseP3WidgetTranslation
{
    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function __toString()
    {
        return (string)$this->language;

    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                 'Timestamp' => array(
                     'class'             => 'zii.behaviors.CTimestampBehavior',
                     'createAttribute'   => 'createdAt',
                     'updateAttribute'   => 'modifiedAt',
                     'setUpdateOnCreate' => true,
                 ),
            )
        );
    }


    public function rules()
    {
        return array_merge(
        /*array('column1, column2', 'rule'),*/
            parent::rules()
        );
    }

    public function get_label()
    {
        return $this->language;

    }
}
