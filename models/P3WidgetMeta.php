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
 * * 
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3widgets.models
 * @since 3.0.1
 */
class P3WidgetMeta extends BaseP3WidgetMeta
{
	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function __toString() {
		return (string) $this->type;

	}

	public function behaviors() {
		return array_merge(
				array(
				'MetaData' => array(
					'class' => 'ext.phundament.p3extensions.behaviors.P3MetaDataBehavior',
					'metaDataRelation' => '_self_',
				)
				), parent::behaviors()
		);
	}


	public function rules() 
	{
		return array_merge(
				/*array('column1, column2', 'rule'),*/
				parent::rules()
				);
	}

}
