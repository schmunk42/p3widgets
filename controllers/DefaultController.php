<?php
/**
 * Class file.
 * @author    Tobias Munk <schmunk@usrbin.de>
 * @link      http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license   http://www.phundament.com/license/
 */

/**
 * Desc
 * Based upon http://www.yiiframework.com/doc/guide/1.1/en/database.migration#c2550 from Leric
 * @author  Tobias Munk <schmunk@usrbin.de>
 * @package p3widgets.controllers
 * @since   3.0.1
 */
class DefaultController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions'    => array('index', 'classVars', 'updateOrder', 'playground'),
                'expression' => 'Yii::app()->user->checkAccess("P3widgets.Default.*")',
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionPlayground()
    {
        $this->render('playground');
    }

    /**
     * returns public class properties as JSON string
     *
     * @param type $alias
     */
    public function actionClassVars($alias)
    {
        $class = $this->createWidget($alias);
        // collect vars from created widget
        foreach ($class AS $key => $prop) {
            $classVars[$key] = $prop;
        }
        $return = array_map(array($this, '_replaceJSON'), $classVars);

        echo CJSON::encode($return);
    }

    /**
     * Handles special values like NULL, false and true, so they can be edited with JSON editor (TODO)
     *
     * @param type $input
     *
     * @return string
     */
    private function _replaceJSON($input)
    {
        if (is_array($input)) {
            return array_map(array($this, '_replaceJSON'), $input);
        } elseif ($input === null) {
            return "NULL";
        } elseif ($input === false) {
            return "0";
        } elseif ($input === true) {
            return "1";
        } else {
            return $input;
        }
    }

    /**
     * tbd
     * Thanks & Credits to peili (http://www.yiiframework.com/extension/p3widgets/#c5563)
     */
    public function actionUpdateOrder()
    {
        if (!isset($_POST['widget'])) {
            echo "No data.";
            return;
        }
        $updateRecordsArray = $_POST['widget'];
        $listingCounter     = 10;
        foreach ($updateRecordsArray as $id) {
            $model       = P3Widget::model()->findByPk($id);
            $model->rank = $listingCounter;
            $model->save();
            $listingCounter = $listingCounter + 10;
        }
        echo "Updated widget order successfully (".CJSON::encode($updateRecordsArray).").";
    }
}