<?php

class m120309_021733_translation extends CDbMigration
{

    public function up()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema)
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        else {
            $options = '';
        }


        // Schema for table 'p3_widget_translation'

        $this->createTable(
            "p3_widget_translation",
            array(
                 "id" => "pk",
                 "p3_widget_id" => "int(11) NOT NULL",
                 "language" => "varchar(8) NOT NULL",
                 "properties" => "text",
                 "content" => "text",
            ),
            $options
        );


        // Foreign Keys for table 'p3_widget_translation'

        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

            $this->addForeignKey(
                'fk_p3_widget_p3_widget_id',
                'p3_widget_translation',
                'p3_widget_id',
                'p3_widget',
                'id',
                'CASCADE',
                'CASCADE'
            ); // update 'null' for ON DELTE and ON UPDATE

        endif;
    }

    public function down()
    {
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
