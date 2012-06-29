<?php

class P3WidgetController extends Controller {

	public $layout = '//layouts/column2';

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions'=>array('admin','delete','index','view','create','update','classVars','updateOrder'),
				'expression' => 'Yii::app()->user->checkAccess("P3widgets.Widget.*")||YII_DEBUG',
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function beforeAction($action) {
		parent::beforeAction($action);
		// map identifcationColumn to id
		if (!isset($_GET['id']) && isset($_GET['id'])) {
			$model = P3Widget::model()->find('id = :id', array(
				':id' => $_GET['id']));
			if ($model !== null) {
				$_GET['id'] = $model->id;
			} else {
				throw new CHttpException(400);
			}
		}
		if ($this->module !== null) {
			$this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
		}
		return true;
	}

	public function actionView($id) {
		$model = $this->loadModel($id);
		$this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new P3Widget;

		$this->performAjaxValidation($model, 'p3-widget-form');

		if (isset($_POST['P3Widget'])) {
			$model->attributes = $_POST['P3Widget'];

			try {
				if ($model->save()) {
					if (isset($_GET['returnUrl'])) {
						$this->redirect($_GET['returnUrl']);
					} else {
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}
		} elseif (isset($_GET['P3Widget'])) {
			$model->attributes = $_GET['P3Widget'];
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model, 'p3-widget-form');

		if (isset($_POST['P3Widget'])) {
			$model->attributes = $_POST['P3Widget'];


			try {
				if ($model->save()) {
					if (isset($_GET['returnUrl'])) {
						$this->redirect($_GET['returnUrl']);
					} else {
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			try {
				$this->loadModel($id)->delete();
			} catch (Exception $e) {
				throw new CHttpException(500, $e->getMessage());
			}

			if (!isset($_GET['ajax'])) {
				$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
				Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('P3Widget');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new P3Widget('search');
		$model->unsetAttributes();

		if (isset($_GET['P3Widget']))
			$model->attributes = $_GET['P3Widget'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function loadModel($id) {
		$model = P3Widget::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'p3-widget-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionClassVars($alias) {
		$class = Yii::createComponent($alias);
		foreach (get_class_vars(get_class($class)) AS $key => $value) {
            // special handling for NULL values
			if ($value === null)
				$return[$key] = "NULL";
            else {
                $return[$key] = $value;
            }
		}
		echo CJSON::encode($return);
	}

	/**
	 * tbd
	 *
	 * Thanks & Credits to peili (http://www.yiiframework.com/extension/p3widgets/#c5563)
	 */
	public function actionUpdateOrder() {
		if (!isset($_POST['widget'])) {
			echo "No data.";
			return;
		}
		$updateRecordsArray = $_POST['widget'];
		$listingCounter = 10;
		foreach ($updateRecordsArray as $id) {
			$model = $this->loadModel($id);
			$model->rank = $listingCounter;
			$model->save(false);
			$listingCounter = $listingCounter + 10;
		}
		echo "Updated widget order successfully.";
	}

}
