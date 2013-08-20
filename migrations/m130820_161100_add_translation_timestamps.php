<?php

class m130820_161100_add_translation_timestamps extends EDbMigration
{
    public function up()
    {
        $this->addColumn('p3_widget_translation','createdAt','DATETIME NOT NULL');
        $this->addColumn('p3_widget_translation','modifiedAt','DATETIME NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('p3_widget_translation','createdAt');
        $this->dropColumn('p3_widget_translation','modifiedAt');
    }
}
