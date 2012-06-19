// Apply another CSS class if a container and/or a widget is hovered
$('.widget-container').mouseover(function(){
    if ($('#P3WidgetContainerShowControls:checked').length !== 0) {
        $(this).addClass('over');
    } else if ($('#P3WidgetContainerShowControls').length === 0) {
        // always show admin controls if element is not present
        $(this).addClass('over');
    }
});
$('.widget-container').mouseout(function(){
    $(this).removeClass('over');
});

$('.widget').mouseover(function(){
    if ($('#P3WidgetContainerShowControls:checked').length !== 0) {
        $(this).addClass('over');
    } else if ($('#P3WidgetContainerShowControls').length === 0) {
        // always show admin controls if element is not present
        $(this).addClass('over');
    }
});
$('.widget').mouseout(function(){
    $(this).removeClass('over');
});

$('BODY').mouseleave(function(){
    console.log('out');
    $('.widget-container ').switchClass('admin','display');
}).mouseenter(function(){
    console.log('over');
    $('.widget-container ').switchClass('display','admin');
});

// Apply sortable function to containers, handle widget movement
// Thanks & Credits to peili (http://www.yiiframework.com/extension/p3widgets/#c5563)
$(function() {
    $( ".widget-container" ).sortable({
        connectWith: ".widget-container",
        placeholder: 'ui-state-highlight',
        forcePlaceholderSize : 32,
        handle: '.handle',
        update: function() {
            var order = $(this).sortable("serialize");
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->controller->createUrl("/p3widgets/p3Widget/updateOrder") ?>',
                data: order,
                error: function(data){
                    alert(data.responseText)
                }
            });
        },
        stop: function(event,ui) {
            widgetId = ui.item.attr('id').replace('widget-','');
            widgetIndex = ui.item.index();
            containerId = $(ui.item).parent().attr('id').replace('container-','');

            msg = 'Moving widget #'+widgetId+' to '+containerId+' index '+widgetIndex;
            console.log(msg);

            url = '<?php echo Yii::app()->controller->createUrl("/p3widgets/p3Widget/update", array("id"=>"_ID_")) ?>';
            $.post(
                url.replace('_ID_',widgetId),
                {
                    P3Widget:{
                        containerId:containerId,
                    }
                },
                function(data){
                    //alert(data); // TODO: detection
                    if(data.search(/View P3Widget/i) != -1) {
                        //alert(msg+' - OK');
                        console.log('OK');
                    } else {
                        alert(msg+' - Error');
                        console.log('ERROR: '+msg);
                    }
                }
                );
        }
    }).disableSelection();
});
/*$(function() {
    $( ".widget-container" ).sortable({
	connectWith: ".widget-container",
	placeholder: 'ui-state-highlight',
	handle: '.handle',
    }).disableSelection();
});*/

// Handler for widget deletion
$('[id^=delete]').click(
    function(){
        widgetId = $(this).attr('id').replace(/delete-/,'');
        if (confirm('Do want really want to delete widget #'+widgetId+'?')) {
            msg = 'Widget #'+widgetId;
            console.log(msg);
            url = '<?php echo Yii::app()->controller->createUrl("/p3widgets/p3Widget/delete", array("id"=>"_ID_")) ?>';
            $.ajax({
                type: 'POST',
                url: url.replace(/_ID_/,widgetId),
                data: {
                    P3Widget:{
                        id:widgetId
                    }
                },
                success: function(data){
                    // TODO: better detection
                    if(data.search(/Manage P3 Widgets/i) != -1) {
                        alert(msg+' deleted');
                        $('#widget-'+widgetId).hide();
                    } else {
                        alert(msg+' could not be deleted!');
                    }
                },
                error: function(data){
                    alert(data.responseText);
                }
            }
            );
            return true;
        } else {
            return false;
        }
    }
    );

$('.widget-container SPAN.cssClasses').each(function(index){
    $(this).html($(this).parent().parent().parent().parent().attr('class'));
});