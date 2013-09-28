<?php

class m121011_180518_fk_delete_cascade extends EDbMigration
{
    public function up()
    {
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):

            $this->dropForeignKey('fk_p3_widget_id', 'p3_widget_meta');
            $this->addForeignKey('fk_p3_widget_id', 'p3_widget_meta', 'id', 'p3_widget', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey(
                'fk_p3_widget_meta_treeParent_id',
                'p3_widget_meta',
                'treeParent_id',
                'p3_widget_meta',
                'id',
                'RESTRICT',
                'RESTRICT'
            );
            $this->dropForeignKey('fk_p3_widget_p3_widget_id', 'p3_widget_translation');
            $this->addForeignKey(
                'fk_p3_widget_p3_widget_id',
                'p3_widget_translation',
                'p3_widget_id',
                'p3_widget',
                'id',
                'CASCADE',
                'CASCADE'
            );

        endif;
    }

    public function down()
    {
        echo "m121011_160518_fk_delete_cascade does not support migration down.\n";
        return false;
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