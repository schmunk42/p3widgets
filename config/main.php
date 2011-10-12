<?php

return array(
	'modules' => array(
		'p3widgets' => array(
			'class' => 'application.modules.p3widgets.P3WidgetsModule',
			'params' => array(
				'widgets' => array(
					'CWidget' => 'Basic Widget',
					'zii.widgets.CMenu' => 'Menu Widget',
					'ext.yiiext.widgets.fancybox.EFancyboxWidget'	=> 'Fancy Box',
					'ext.yiiext.widgets.cycle.ECycleWidget'			=> 'Cycle',
					#'ext.yiiext.widgets.carousel.ECarouselWidget'	=> 'Carousel',
				)
			)
		)
	),
)
	
?>