<?php

// auto-loading fix
Yii::setPathOfAlias('P3Widget', dirname(__FILE__));
Yii::import('P3Widget.*');

class P3Widget extends BaseP3Widget {

	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function init() {
		return parent::init();
	}

	public function __toString() {
		return (string) $this->alias;
	}

	public function behaviors() {
		return array_merge(
				array(
				'MetaData' => array(
					'class' => 'ext.p3extensions.behaviors.P3MetaDataBehavior',
					'metaDataRelation' => 'p3WidgetMeta',
				),
				'Translation' => array(
					'class' => 'ext.p3extensions.behaviors.P3TranslationBehavior',
					'relation' => 'p3WidgetTranslations',
					'fallbackLanguage' => 'en',
					'fallbackValue' => null,
				//'attributesBlacklist' => array('loadfrom'),
				)
				), parent::behaviors()
		);
	}

	public function rules() {
		return array_merge(
				/* array('column1, column2', 'rule'), */
				parent::rules()
		);
	}

}
