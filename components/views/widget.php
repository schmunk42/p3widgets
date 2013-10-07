<div class="widget"
     data-toggle="tooltip"
     title="<?php echo "{$model->alias} #{$model->id}" ?>"
     id="<?php echo P3WidgetContainer::WIDGET_CSS_PREFIX . $model->id ?>">

    <?php $this->render(
        'overlay',
        array(
             'widgetAttributes' => $widgetAttributes,
             'model'            => $model,
             'headline'         => $headline
        )
    ) ?>

    <div class="content-panel">
        <?php echo $content; ?>
    </div>
</div>
