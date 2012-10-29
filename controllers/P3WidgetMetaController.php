<?php
/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Desc
 * 
 * Based upon http://www.yiiframework.com/doc/guide/1.1/en/database.migration#c2550 from Leric
 * 
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3widgets.controllers
 * @since 3.0.1
 */
class P3WidgetMetaController extends Controller {

	public $layout = '//layouts/column2';

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('admin', 'delete', 'index', 'view', 'create', 'update', 'classVars', 'updateOrder'),
				'expression' => 'Yii::app()->user->checkAccess("P3widgets.Widget.*")',
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function beforeAction($action) {
		parent::beforeAction($action);
		// map identifcationColumn to id
		if (!isset($_GET['id']) && isset($_GET['id'])) {
			$model = P3WidgetMeta::model()->find('id = :id', array(
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
		$model = new P3WidgetMeta;

		$this->performAjaxValidation($model, 'p3-widget-meta-form');

		if (isset($_POST['P3WidgetMeta'])) {
			$model->attributes = $_POST['P3WidgetMeta'];

			try {
				if ($model->save()) {
					if ($returnUrl = Yii::app()->request->getParam('returnUrl')) {
						$this->redirect($returnUrl);
					} else {
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			} catch (Exception $e) {
				$model->addError('id', $e->getMessage());
			}
		} elseif (isset($_GET['P3WidgetMeta'])) {
			$model->attributes = $_GET['P3WidgetMeta'];
		}

		$this->render('create', array('model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model, 'p3-widget-meta-form');

		if (isset($_POST['P3WidgetMeta'])) {
			$model->attributes = $_POST['P3WidgetMeta'];


			try {
				if ($model->save()) {
					if ($returnUrl = Yii::app()->request->getParam('returnUrl')) {
						$this->redirect($returnUrl);
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
		$dataProvider = new CActiveDataProvider('P3WidgetMeta');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new P3WidgetMeta('search');
		$model->unsetAttributes();

		if (isset($_GET['P3WidgetMeta']))
			$model->attributes = $_GET['P3WidgetMeta'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function loadModel($id) {
		$model = P3WidgetMeta::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'p3-widget-meta-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
