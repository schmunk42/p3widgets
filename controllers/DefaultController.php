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
                'actions'    => array('index', 'playground'),
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

}