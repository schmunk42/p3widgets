<?php

class m110518_000000_init extends CDbMigration {

	public function up() {
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable("p3_widget", array(
			"id" => "pk",
			"alias" => "varchar(128) NOT NULL",
			"properties" => "text",
			"content" => "text",
			"rank" => "integer(11) NOT NULL default 0",
			"containerId" => "varchar(128) NOT NULL",
			"moduleId" => "varchar(128)",
			"controllerId" => "varchar(128)",
			"actionName" => "varchar(128)",
			"requestParam" => "varchar(128)",
			"sessionParam" => "varchar(128)",
			), $options);
	}

	public function down() {
		$this->dropTable('p3_widgets');
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