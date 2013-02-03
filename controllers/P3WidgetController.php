<?php

class P3WidgetController extends Controller
{
    #public $layout='//layouts/column2';
    public $defaultAction = "admin";
    public $scenario = "crud";

public function filters() {
	return array(
			'accessControl',
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','ajaxUpdate','update','delete','admin','view','classVars','updateOrder'),
				'roles'=>array('P3widgets.P3Widget.*'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}

    public function beforeAction($action){
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model=P3Widget::model()->find('id = :id', array(
            ':id' => $_GET['id']));
            if ($model !== null) {
                $_GET['id'] = $model->id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
        }
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view',array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new P3Widget;
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'p3-widget-form');

        if (isset($_GET['autoCreate'])) {
            $_POST['P3Widget'] = $_GET['P3Widget'];
        }

        if(isset($_POST['P3Widget'])) {
            $model->attributes = $_POST['P3Widget'];

            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif(isset($_GET['P3Widget'])) {
            $model->attributes = $_GET['P3Widget'];
        }

        $this->render('create',array( 'model'=>$model));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'p3-widget-form');
        
        if(isset($_POST['P3Widget']))
        {
            $model->attributes = $_POST['P3Widget'];


            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }

        $this->render('update',array('model'=>$model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('P3Widget');  // classname of model to be updated
        $es->update();
    }

    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500,$e->getMessage());
            }

            if(!isset($_GET['ajax']))
            {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        }
        else
            throw new CHttpException(400,Yii::t('P3WidgetsModule.crud', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('P3Widget');
        $this->render('index',array('dataProvider'=>$dataProvider,));
    }

    public function actionAdmin()
    {
        $model=new P3Widget('search');
        $model->unsetAttributes();

        if(isset($_GET['P3Widget'])) {
            $model->attributes = $_GET['P3Widget'];
        }

        $this->render('admin',array('model'=>$model,));
    }

    public function loadModel($id)
    {
        $model=P3Widget::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,Yii::t('P3WidgetsModule.crud', 'The requested page does not exist.'));
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='p3-widget-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * returns public class properties as JSON string
     *
     * @param type $alias
     */
    public function actionClassVars($alias) {
        $class = Yii::createComponent($alias);
        $array = get_class_vars(get_class($class));
        $return = array_map(array($this, '_replaceJSON'), $array);
        echo CJSON::encode($return);
    }

    /**
     * Handles special values like NULL, false and true, so they can be edited with JSON editor (TODO)
     *
     * @param type $input
     * @return string
     */
    private function _replaceJSON($input) {
        if (is_array($input)) {
            return array_map(array($this, '_replaceJSON'), $input);
        } elseif ($input === null)
            return "NULL";
        elseif ($input === false) {
            return "0";
        } elseif ($input === true) {
            return "1";
        } else {
            return $input;
        }
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
