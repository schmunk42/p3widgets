<?php

class m120920_122921_fix_widget_aliases extends EDbMigration
{
	public function safeUp()
	{
        $this->update('p3_widget', array('alias'=>'TbHeroUnit'), 'alias = :oldAlias', array(':oldAlias'=>'ext.crisu83.yii-bootstrap.widgets.BootHero'));
        $this->update('p3_widget', array('alias'=>'TbCarousel'), 'alias = :oldAlias', array(':oldAlias'=>'ext.crisu83.yii-bootstrap.widgets.BootCarousel'));
        $this->update('p3_widget', array('alias'=>'EFancyBoxWidget'), 'alias = :oldAlias', array(':oldAlias'=>'ext.yiiext.fancybox-widget.EFancyboxWidget'));
	}

	public function safeDown()
	{
		echo "m120920_122921_fix_widget_aliases does not support migration down.\n";
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
