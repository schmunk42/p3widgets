<?php

class DefaultController extends Controller {

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', 
				'actions'=>array('admin','delete','index','view','create','update'),
				'expression' => 'Yii::app()->user->checkAccess("P3widgets.Default.*")',
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex() {
		$this->render('index');
	}


}