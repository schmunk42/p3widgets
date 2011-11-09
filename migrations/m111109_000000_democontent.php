<?php

class m111109_000000_democontent extends CDbMigration {

	public function up() {
		$this->insert("p3_widget", array(
			"id" => "1",
			"alias" => "CWidget",
			"properties" => "{}",
			"content" => "<h1>
	Phundament 3 Widget Demo</h1>
<p>
	Congratulations! You have successfully created your application.</p>
<h2>
	Usage</h2>
<p>
	You have to&nbsp;login with <strong>editor</strong> /<strong>editor</strong>&nbsp;to change to content of this page.</p>
<p>
	Hover a container and click on the [+] plus sign to add a widget.</p>
<p>
	For more details on how to further develop this application, please visit&nbsp;<a href=\"http://www.phundament.com/\">our website</a>.</p>
",
			"rank" => "0",
			"containerId" => "top",
			"moduleId" => "",
			"controllerId" => "site",
			"actionName" => "page",
			"requestParam" => "widgets",
			"sessionParam" => "",
		));

		$this->insert("p3_widget_meta", array(
			"id" => "1",
			"status" => "30",
			"type" => null,
			"language" => "de_de",
			"treeParent_id" => null,
			"treePosition" => null,
			"begin" => null,
			"end" => null,
			"keywords" => null,
			"customData" => null,
			"label" => null,
			"owner" => "3",
			"checkAccessCreate" => null,
			"checkAccessRead" => null,
			"checkAccessUpdate" => "Editor",
			"checkAccessDelete" => "Editor",
			"createdAt" => "2011-11-09 15:38:43",
			"createdBy" => "3",
			"modifiedAt" => "0000-00-00 00:00:00",
			"modifiedBy" => null,
			"guid" => null,
			"ancestor_guid" => null,
			"model" => "Widget",
		));
	}

	public function down() {
		
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