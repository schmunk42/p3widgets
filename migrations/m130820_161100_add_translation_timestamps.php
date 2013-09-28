<?php

class m130820_161100_add_translation_timestamps extends EDbMigration
{
    public function up()
    {
        $this->addColumn('p3_widget_translation','createdAt','DATETIME NOT NULL DEFAULT "0000-00-00"');
        $this->addColumn('p3_widget_translation','modifiedAt','DATETIME NOT NULL DEFAULT "0000-00-00"');
    }

    public function down()
    {
        $this->dropColumn('p3_widget_translation','createdAt');
        $this->dropColumn('p3_widget_translation','modifiedAt');
    }
}
