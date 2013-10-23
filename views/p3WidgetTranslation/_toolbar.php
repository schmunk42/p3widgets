<?php Yii::beginProfile('P3WidgetTranslation.view.toolbar'); ?>

<?php
    $showDeleteButton = (Yii::app()->request->getParam("id"))?true:false;
    $showManageButton = true;
    $showCreateButton = true;
    $showUpdateButton = true;
    $showCancelButton = true;
    $showSaveButton   = true;
    $showViewButton   = true;

    switch($this->action->id){
        case "admin":
            $showCancelButton = false;
            $showSaveButton   = false;
            $showViewButton   = false;
            $showUpdateButton = false;
            break;
        case "update":
            $showCreateButton = false;
            $showUpdateButton = false;
            break;
        case "create":
            $showCreateButton = false;
            $showViewButton   = false;
            $showUpdateButton = false;
            break;
        case "view":
            $showViewButton   = false;
            $showSaveButton   = false;
            $showCreateButton = false;
            break;
    }
?>
<div class="clearfix">
    <div class="btn-toolbar pull-right">
        <!-- relations -->
                    <div class="btn-group">
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                       'size'=>'large',
                       'buttons' => array(
                               array(
                                #'label'=>Yii::t('P3WidgetsModule.crud','Relations'),
                                'icon'=>'icon-random',
                                'items'=>array(array(
                    'icon' => 'circle-arrow-left','label' => Yii::t('P3WidgetsModule.model','relation.P3Widget'), 'url' =>array('/p3widgets/p3Widget/admin')),
            )
          ),
        ),
    ));
?>            </div>

        
        <div class="btn-group">
            <?php
             $this->widget("bootstrap.widgets.TbButton", array(
                           "label"=>Yii::t("P3WidgetsModule.crud","Manage"),
                           "icon"=>"icon-list-alt",
                           "size"=>"large",
                           "url"=>array("admin"),
                           "visible"=>$showManageButton && (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.View"))
                        ));
         ?>        </div>
    </div>

    <div class="btn-toolbar pull-left">
        <div class="btn-group">
            <?php
                   $this->widget("bootstrap.widgets.TbButton", array(
                       #"label"=>Yii::t("P3WidgetsModule.crud","Cancel"),
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>$showCancelButton && (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.View")),
                       "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("P3WidgetsModule.crud","Cancel"),
                                   )
                    ));
                   $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("P3WidgetsModule.crud","Create"),
                        "icon"=>"icon-plus",
                        "size"=>"large",
                        "type"=>"success",
                        "url"=>array("create"),
                        "visible"=>$showCreateButton && (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.Create"))
                   ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("P3WidgetsModule.crud","Delete"),
                        "type"=>"danger",
                        "icon"=>"icon-trash icon-white",
                        "size"=>"large",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                            "confirm"=>Yii::t("P3WidgetsModule.crud","Do you want to delete this item?")
                        ),
                        "visible"=> $showDeleteButton && (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.Delete"))
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        #"label"=>Yii::t("P3WidgetsModule.crud","Update"),
                        "icon"=>"icon-edit",
                        "type"=>"primary",
                        "size"=>"large",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey}),
                        "visible"=> $showUpdateButton &&  (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.Update"))
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        #"label"=>Yii::t("P3WidgetsModule.crud","View"),
                        "icon"=>"icon-eye-open",
                        "size"=>"large",
                        "url"=>array("view","id"=>$model->{$model->tableSchema->primaryKey}),
                        "visible"=>$showViewButton &&  (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.View")),
                        "htmlOptions"=>array(
                                      "data-toggle"=>"tooltip",
                                      "title"=>Yii::t("P3WidgetsModule.crud","View Mode"),
                        )
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                       "label"=>Yii::t("P3WidgetsModule.crud","Save"),
                       "icon"=>"save",
                       "size"=>"large",
                       "type"=>"primary",
                       "htmlOptions"=> array(
                            "onclick"=>"$('.crud-form form').submit();",
                       ),
                       "visible"=>$showSaveButton &&  (Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.*") || Yii::app()->user->checkAccess("P3widgets.P3WidgetTranslation.View"))
                    ));
             ?>        </div>
        <?php if($this->action->id == 'admin'): ?>        <div class="btn-group">
            
            <?php
                $this->widget(
                       "bootstrap.widgets.TbButton",
                       array(
                           #"label"=>Yii::t("P3WidgetsModule.crud","Search"),
                                   "icon"=>"icon-search",
                                   "size"=>"large",
                                   "htmlOptions"=>array(
                                       "class"=>"search-button",
                                       "data-toggle"=>"tooltip",
                                       "title"=>Yii::t("P3WidgetsModule.crud","Advanced Search"),
                                   )
                           )
                       );
                    ?>
                    <?php
                $this->widget(
                       "bootstrap.widgets.TbButton",
                       array(
                           #"label"=>Yii::t("P3WidgetsModule.crud","Clear"),
                                   "icon"=>"icon-remove-sign",
                                   "size"=>"large",
                                   "url"=>Yii::app()->baseURL."/".Yii::app()->request->getPathInfo(),
                                   "htmlOptions"=>array(
                                      "data-toggle"=>"tooltip",
                                      "title"=>Yii::t("P3WidgetsModule.crud","Clear Search"),
                                   )
                           )
                       );
                    ?>
                            </div>
        <?php endif; ?>
    </div>


</div>


<?php if($this->action->id == 'admin'): ?><div class="search-form" style="display:none">
    <?php Yii::beginProfile('P3WidgetTranslation.view.toolbar.search'); ?>    <?php $this->renderPartial('_search',array('model' => $model,)); ?>
    <?php Yii::endProfile('P3WidgetTranslation.view.toolbar.search'); ?></div>
<?php endif; ?>
<?php Yii::endProfile('P3WidgetTranslation.view.toolbar'); ?>