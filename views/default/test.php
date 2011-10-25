<h1>Widget Debug Page</h1>
<p>Access only wih YII_DEBUG === true</p>
<?php
$this->widget(
	'p3widgets.components.P3WidgetContainer', array(
		'id' => 'main',
		'checkAccess' => !YII_DEBUG // disable checkAccess feature for debugging, default 'P3widgets.Widget.*'
	)
);
?>
