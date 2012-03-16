
<?php

class m120312_192854_democontent2 extends CDbMigration {

	public function up() {
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';



// Data for table 'p3_widget'

		$this->insert("p3_widget", array(
			"id" => "1",
			"alias" => "ext.yii-bootstrap.widgets.BootHero",
			"rank" => "0",
			"containerId" => "hero",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "index",
			"requestParam" => "",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "2",
			"alias" => "CWidget",
			"rank" => "0",
			"containerId" => "left",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "index",
			"requestParam" => "",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "3",
			"alias" => "CWidget",
			"rank" => "0",
			"containerId" => "middle",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "index",
			"requestParam" => "",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "4",
			"alias" => "CWidget",
			"rank" => "0",
			"containerId" => "right",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "index",
			"requestParam" => "",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "5",
			"alias" => "ext.yiiext.widgets.fancybox.EFancyboxWidget",
			"rank" => "0",
			"containerId" => "main",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "index",
			"requestParam" => "",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "6",
			"alias" => "ext.yiiext.widgets.lipsum.ELipsum",
			"rank" => "0",
			"containerId" => "wiki",
			"moduleId" => "",
			"controllerId" => "wiki",
			"actionName" => "index",
			"requestParam" => "test",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "7",
			"alias" => "CWidget",
			"rank" => "0",
			"containerId" => "footer",
			"moduleId" => "_ALL",
			"controllerId" => "_ALL",
			"actionName" => "_ALL",
			"requestParam" => "_ALL",
			"sessionParam" => "_ALL",
		));

		$this->insert("p3_widget", array(
			"id" => "8",
			"alias" => "CWidget",
			"rank" => "0",
			"containerId" => "sidebar",
			"moduleId" => "p3pages",
			"controllerId" => "default",
			"actionName" => "page",
			"requestParam" => "_ALL",
			"sessionParam" => "",
		));

		$this->insert("p3_widget", array(
			"id" => "9",
			"alias" => "ext.yiiext.widgets.lipsum.ELipsum",
			"rank" => "0",
			"containerId" => "main",
			"moduleId" => "p3pages",
			"controllerId" => "default",
			"actionName" => "page",
			"requestParam" => "3",
			"sessionParam" => "",
		));


// Data for table 'p3_widget_meta'

		$this->insert("p3_widget_meta", array(
			"id" => "1",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:25:56",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 18:50:48",
			"modifiedBy" => null,
			"guid" => "966A2A61-3343-4FA6-9001-EBAD97351B94",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "2",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:26:29",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 18:50:48",
			"modifiedBy" => null,
			"guid" => "E82A5709-0422-4234-9A89-67702DA0BECE",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "3",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:26:35",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 18:50:48",
			"modifiedBy" => null,
			"guid" => "C23B7CAC-E85C-4A72-BCF1-80AFF2A9994B",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "4",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:26:41",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 18:50:48",
			"modifiedBy" => null,
			"guid" => "F3B5B9B6-305C-4257-9313-3E3373AE1829",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "5",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:26:50",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 23:12:40",
			"modifiedBy" => "1",
			"guid" => "2104A3FD-11F7-4DA5-8E10-8C71A583BBED",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "6",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-12 19:27:14",
			"createdBy" => "1",
			"modifiedAt" => "2012-03-15 18:50:48",
			"modifiedBy" => null,
			"guid" => "4BD5755E-70F1-40CE-8108-B9973D48778B",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "7",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Admin",
			"checkAccessDelete" => "Admin",
			"createdAt" => "2012-03-15 23:07:48",
			"createdBy" => "1",
			"modifiedAt" => "0000-00-00 00:00:00",
			"modifiedBy" => null,
			"guid" => "49E3DF32-16AB-465D-889E-92A859DE34BF",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "8",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-16 18:26:57",
			"createdBy" => "1",
			"modifiedAt" => "0000-00-00 00:00:00",
			"modifiedBy" => null,
			"guid" => "90B91E4D-316A-4A6E-A609-AB0F9AF72FA1",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "9",
			"status" => "30",
			"type" => null,
			"language" => "_ALL",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "1",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2012-03-16 18:28:34",
			"createdBy" => "1",
			"modifiedAt" => "0000-00-00 00:00:00",
			"modifiedBy" => null,
			"guid" => "4AC10926-2D65-4018-A289-9E7E9863225F",
			"ancestor_guid" => null,
			"model" => "P3Widget",
		));




// Data for table 'p3_widget_translation'

		$this->insert("p3_widget_translation", array(
			"id" => "1",
			"p3_widget_id" => "1",
			"language" => "en",
			"properties" => "{\"options\":{},\"events\":{},\"htmlOptions\":{},\"skin\":\"default\",\"heading\":\"Hello World!\",\"content\":\"Phundament 3\"}",
			"content" => null,
		));

		$this->insert("p3_widget_translation", array(
			"id" => "2",
			"p3_widget_id" => "2",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
		));

		$this->insert("p3_widget_translation", array(
			"id" => "3",
			"p3_widget_id" => "3",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
		));

		$this->insert("p3_widget_translation", array(
			"id" => "4",
			"p3_widget_id" => "4",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<h2>

	Ex feugait processus</h2>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

<h3>

	Est veniam sit, Qui ut typi con</h3>

<p>

	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>

",
		));

		$this->insert("p3_widget_translation", array(
			"id" => "5",
			"p3_widget_id" => "5",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<h2>
	Ex feugait processus</h2>
<p>
	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>
<ul class=\"thumbnails\">
	<li class=\"span4\">
		<a class=\"thumbnail\" href=\"http://placehold.it/800x600.png\"><img alt=\"\" src=\"http://placehold.it/360x268\" /> </a></li>
	<li class=\"span2\">
		<a class=\"thumbnail\" href=\"http://placehold.it/800x600.png\"><img alt=\"\" src=\"http://placehold.it/160x120\" /> </a></li>
	<li class=\"span2\">
		<a class=\"thumbnail\" href=\"http://placehold.it/800x600.png\"><img alt=\"\" src=\"http://placehold.it/160x120\" /> </a></li>
</ul>
<h3>
	Est veniam sit, Qui ut typi con</h3>
<p>
	Ex feugait processus Est veniam sit, Qui ut typi con. Sequat nobis elit. Liber facer elit delenit nunc consequat. Parum augue in minim vero amet. Te qui ut per molestie notare.</p>
",
		));

		$this->insert("p3_widget_translation", array(
			"id" => "6",
			"p3_widget_id" => "7",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<div class=\"pull-left\">
	&copy; 2012 by My Company</div>
<div class=\"pull-right\">
	<a href=\"http://phundament.com\"><img alt=\"Powered by Phundament 3\" src=\"http://t.phundament.com/p3-32-bw.png\" /></a></div>
",
		));

		$this->insert("p3_widget_translation", array(
			"id" => "7",
			"p3_widget_id" => "8",
			"language" => "en",
			"properties" => "{\"skin\":\"default\"}",
			"content" => "<p>
	I am a sidebar for all P3Pages!</p>
",
		));
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
