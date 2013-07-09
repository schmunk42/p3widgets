<?php

class m130709_114520_update_meta_data_language extends EDbMigration
{
    public function safeUp()
    {
        $this->update('p3_widget_meta', array('language' => '*'), 'language = "_ALL"');
    }

    public function safeDown()
    {
        $this->update('p3_widget_meta', array('language' => '_ALL'), 'language = "*"');
    }
}