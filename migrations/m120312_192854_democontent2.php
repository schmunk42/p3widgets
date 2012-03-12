
<?php

class m120312_192854_democontent2 extends CDbMigration {

	public function up() {
		if (Yii::app()->db->schema instanceof CMysqlSchema)
	$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
else
	$options = '';




// Data for table 'p3_widget'

$this->insert("p3_widget", array(
    "id"=>"1",
    "alias"=>"ext.yii-bootstrap.widgets.BootHero",
    "rank"=>"0",
    "containerId"=>"hero",
    "moduleId"=>"",
    "controllerId"=>"site",
    "actionName"=>"index",
    "requestParam"=>"",
    "sessionParam"=>"",
) );

$this->insert("p3_widget", array(
    "id"=>"2",
    "alias"=>"CWidget",
    "rank"=>"0",
    "containerId"=>"left",
    "moduleId"=>"",
    "controllerId"=>"site",
    "actionName"=>"index",
    "requestParam"=>"",
    "sessionParam"=>"",
) );

$this->insert("p3_widget", array(
    "id"=>"3",
    "alias"=>"CWidget",
    "rank"=>"0",
    "containerId"=>"middle",
    "moduleId"=>"",
    "controllerId"=>"site",
    "actionName"=>"index",
    "requestParam"=>"",
    "sessionParam"=>"",
) );

$this->insert("p3_widget", array(
    "id"=>"4",
    "alias"=>"CWidget",
    "rank"=>"0",
    "containerId"=>"right",
    "moduleId"=>"",
    "controllerId"=>"site",
    "actionName"=>"index",
    "requestParam"=>"",
    "sessionParam"=>"",
) );

$this->insert("p3_widget", array(
    "id"=>"5",
    "alias"=>"CWidget",
    "rank"=>"0",
    "containerId"=>"main",
    "moduleId"=>"",
    "controllerId"=>"site",
    "actionName"=>"index",
    "requestParam"=>"",
    "sessionParam"=>"",
) );

$this->insert("p3_widget", array(
    "id"=>"6",
    "alias"=>"ext.yiiext.widgets.lipsum.ELipsum",
    "rank"=>"0",
    "containerId"=>"wiki",
    "moduleId"=>"",
    "controllerId"=>"wiki",
    "actionName"=>"index",
    "requestParam"=>"test",
    "sessionParam"=>"",
) );



// Data for table 'p3_widget_meta'

$this->insert("p3_widget_meta", array(
    "id"=>"1",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:25:56",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"966A2A61-3343-4FA6-9001-EBAD97351B94",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );

$this->insert("p3_widget_meta", array(
    "id"=>"2",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:26:29",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"E82A5709-0422-4234-9A89-67702DA0BECE",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );

$this->insert("p3_widget_meta", array(
    "id"=>"3",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:26:35",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"C23B7CAC-E85C-4A72-BCF1-80AFF2A9994B",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );

$this->insert("p3_widget_meta", array(
    "id"=>"4",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:26:41",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"F3B5B9B6-305C-4257-9313-3E3373AE1829",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );

$this->insert("p3_widget_meta", array(
    "id"=>"5",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:26:50",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"2104A3FD-11F7-4DA5-8E10-8C71A583BBED",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );

$this->insert("p3_widget_meta", array(
    "id"=>"6",
    "status"=>"30",
    "type"=>null,
    "language"=>"_ALL",
    "treeParent_id"=>null,
    "treePosition"=>null,
    "begin"=>null,
    "end"=>null,
    "keywords"=>null,
    "customData"=>null,
    "label"=>null,
    "owner"=>"1",
    "checkAccessCreate"=>null,
    "checkAccessRead"=>null,
    "checkAccessUpdate"=>"Editor",
    "checkAccessDelete"=>"Editor",
    "createdAt"=>"2012-03-12 19:27:14",
    "createdBy"=>"1",
    "modifiedAt"=>null,
    "modifiedBy"=>null,
    "guid"=>"4BD5755E-70F1-40CE-8108-B9973D48778B",
    "ancestor_guid"=>null,
    "model"=>"P3Widget",
) );




// Data for table 'p3_widget_translation'

$this->insert("p3_widget_translation", array(
    "id"=>"1",
    "p3_widget_id"=>"1",
    "language"=>"en",
    "properties"=>"{\"options\":{},\"events\":{},\"htmlOptions\":{},\"skin\":\"default\",\"heading\":\"Hello World!\",\"content\":\"Phundament 3\"}",
    "content"=>null,
) );

$this->insert("p3_widget_translation", array(
    "id"=>"2",
    "p3_widget_id"=>"2",
    "language"=>"en",
    "properties"=>"{\"skin\":\"default\"}",
    "content"=>"<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
) );

$this->insert("p3_widget_translation", array(
    "id"=>"3",
    "p3_widget_id"=>"3",
    "language"=>"en",
    "properties"=>"{\"skin\":\"default\"}",
    "content"=>"<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
) );

$this->insert("p3_widget_translation", array(
    "id"=>"4",
    "p3_widget_id"=>"4",
    "language"=>"en",
    "properties"=>"{\"skin\":\"default\"}",
    "content"=>"<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
) );

$this->insert("p3_widget_translation", array(
    "id"=>"5",
    "p3_widget_id"=>"5",
    "language"=>"en",
    "properties"=>"{\"skin\":\"default\"}",
    "content"=>"<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<ul class=\"thumbnails\">

	<li class=\"span4\">

		<a class=\"thumbnail\" href=\"#\"><img alt=\"\" src=\"http://placehold.it/360x268\" /> </a></li>

	<li class=\"span2\">

		<a class=\"thumbnail\" href=\"#\"><img alt=\"\" src=\"http://placehold.it/160x120\" /> </a></li>

	<li class=\"span2\">

		<a class=\"thumbnail\" href=\"#\"><img alt=\"\" src=\"http://placehold.it/160x120\" /> </a></li>

</ul>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
) );


	}

	public function down() {
		echo 'Migration down not supported.';
	}

	/*
	  // Use safeUp/safeDown to do migration with transaction
	  public function safeUp()
	  {
	  }

	  public function safeDown()
	  {
	  }
	 */
}

?>
