$('.widget-container').mouseover(function(){
    $(this).addClass('over');
});
$('.widget-container').mouseout(function(){
    $(this).removeClass('over');
});

$('.widget').mouseover(function(){
    $(this).addClass('over');
});
$('.widget').mouseout(function(){
    $(this).removeClass('over');
});


$(function() {
    $( ".widget-container" ).sortable({
	connectWith: ".widget-container",
	placeholder: 'ui-state-highlight',
	handle: '.handle',
	stop: function(event,ui) {
	    widgetId = ui.item.attr('id').replace('widget-','');
	    widgetIndex = ui.item.index();
	    containerId = $(ui.item).parent().attr('id').replace('container-','');

	    msg = 'Moving widget #'+widgetId+' to '+containerId+' index '+widgetIndex;
	    console.log(msg);

	    url = '<?php echo Yii::app()->controller->createUrl("/p3widgets/widget/update", array("id"=>"_ID_")) ?>';
	    $.post(
		url.replace('_ID_',widgetId),
		{Widget:{containerId:containerId,rank:widgetIndex*10}},
		function(data){
		    //alert(data);
		    if(data.search(/<h1>View Widget/i) != -1) {
			//alert(msg+' - OK');
				console.log('OK');
		    } else {
			alert(msg+' - Error');
			console.log('ERROR'+msg);
		    }
		}
		);
	}
    }).disableSelection();
});

