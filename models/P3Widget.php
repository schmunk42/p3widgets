<?php

// auto-loading fix
Yii::setPathOfAlias('P3Widget', dirname(__FILE__));
Yii::import('P3Widget.*');

class P3Widget extends BaseP3Widget
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

    public function defaultScope()
    {
        return array('with' => array('p3WidgetMeta', 'p3WidgetTranslations'));
    }

    public function behaviors()
    {
        return array_merge(
            array(
                 'MetaData' => array(
                     'class'            => 'P3MetaDataBehavior',
                     'metaDataRelation' => 'p3WidgetMeta',
                     'contentRelation'  => 'id0',
                     'defaultLanguage'  => (Yii::app()->params['P3Widget.defaultLanguage']) ?
                         Yii::app()->params['P3Widget.defaultLanguage'] : P3MetaDataBehavior::ALL_LANGUAGES,
                     'defaultStatus'    => (Yii::app()->params['P3Widget.defaultStatus']) ?
                         Yii::app()->params['P3Widget.defaultStatus'] : P3MetaDataBehavior::STATUS_ACTIVE,
                 ),
                 'Translation' => array(
                     'class'             => 'P3TranslationBehavior',
                     'relation'          => 'p3WidgetTranslations',
                     'fallbackLanguage'  => (isset(Yii::app()->params['P3Widget.fallbackLanguage'])) ?
                         Yii::app()->params['P3Widget.fallbackLanguage'] : Yii::app()->sourceLanguage,
                     'fallbackIndicator' => null,
                     'fallbackValue'     => (isset(Yii::app()->params['P3Widget.fallbackValue'])) ?
                         Yii::app()->params['P3Widget.fallbackValue'] : null,
                 )
            ),
            parent::behaviors()
        );
    }

    public function rules()
    {
        return array_merge(
        /* array('column1, column2', 'rule'), */
            parent::rules()
        );
    }

    public function get_label()
    {
        return '#' . $this->id . " " . $this->alias;
    }
}
