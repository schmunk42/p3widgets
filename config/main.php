<?php

return array(
	'modules' => array(
		'p3widgets' => array(
			'class' => 'application.modules.p3widgets.P3WidgetsModule',
			'params' => array(
				'widgets' => array(
					'CWidget' => 'Basic Widget',
					'zii.widgets.CMenu' => 'Menu Widget',
					'ext.yiiext.widgets.carousel.ECarouselWidget'	=> 'Carousel',
					'ext.yiiext.widgets.fancybox.EFancyBoxWidget'	=> 'Fancy Box',
					'ext.yiiext.widgets.cycle.ECycleWidget'			=> 'Cycle',
				)
			)
		)
	),
)
	
?>