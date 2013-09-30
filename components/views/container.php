<div id="<?php echo P3WidgetContainer::CONTAINER_CSS_PREFIX . $this->id ?>"
     class="widget-container display control-position-<?php echo $this->controlPosition ?>">
    <?php $this->render('overlay', array('widgetAttributes' => $widgetAttributes, 'headline' => null)) ?>
    <?php echo $widgets ?>
</div>