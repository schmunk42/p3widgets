<div class="widget"
     data-toggle="tooltip"
     data-html="true"
     title="<?php echo "{$model->alias}
        <span class='label label-{$model->statusCssClass}'><i class='icon icon-pencil'></i></span>
        <span class='label label-{$model->translationModel->statusCssClass}'><i class='icon icon-flag'></i></span>
        " ?>"
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
