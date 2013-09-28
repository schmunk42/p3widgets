<?php

class m111028_000000_meta extends CDbMigration
{

    public function up()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema)
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        else {
            $options = '';
        }

        $this->createTable(
            "p3_widget_meta",
            array(
                 "id"                => "int(11) NOT NULL",
                 "status"            => "int(11)",
                 "type"              => "varchar(64)",
                 "language"          => "varchar(8)",
                 "treeParent_id"     => "int(11)",
                 "treePosition"      => "int(11)",
                 "begin"             => "datetime",
                 "end"               => "datetime",
                 "keywords"          => "text",
                 "customData"        => "text",
                 "label"             => "int(11)",
                 "owner"             => "varchar(64)",
                 "checkAccessCreate" => "varchar(256)",
                 "checkAccessRead"   => "varchar(256)",
                 "checkAccessUpdate" => "varchar(256)",
                 "checkAccessDelete" => "varchar(256)",
                 "createdAt"         => "timestamp",
                 "createdBy"         => "varchar(64)",
                 "modifiedAt"        => "timestamp",
                 "modifiedBy"        => "varchar(64)",
                 "guid"              => "varchar(64)",
                 "ancestor_guid"     => "varchar(64)",
                 "model"             => "varchar(128)",
                 "PRIMARY KEY (id)"
            ),
            $options
        );

        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

            $this->addForeignKey(
                'fk_p3_widget_id',
                'p3_widget_meta',
                'id',
                'p3_widget',
                'id',
                'CASCADE',
                'CASCADE'
            ); // update 'null' for ON DELTE and ON UPDATE

        endif;

    }

    public function down()
    {
        $this->dropTable('p3_widget_meta');
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