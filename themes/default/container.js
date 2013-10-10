// Apply another CSS class if a container and/or a widget is hovered
$('.widget-container')
    .mouseenter(function () {
        if ($('#P3WidgetContainerShowControls.view').length > 0 || $('.widget', this).length > 0) {

        } else {
            $('.widget-container').removeClass('over');
            $(this).addClass('over');
        }
    })
    .mouseleave(function () {
        $(this).removeClass('over');
    });

$('.widget')
    .mouseenter(function () {
        if ($('#P3WidgetContainerShowControls.view').length > 0) {

        } else {
            $('.widget').removeClass('over');
            $(this).addClass('over');
        }
    })
    .mouseleave(function () {
        $(this).removeClass('over');
    });


$('.create-widget')
    .change(function () {
        p3WidgetParams = $(this).data('widget-attributes');
        p3WidgetParams.alias = $(this).val();
        url = "<?php echo Yii::app()->controller->createUrl('/p3widgets/p3Widget/create') ?>";

        params = {};
        params.autoCreate = "1";
        params.returnUrl = "<?php echo urlencode($_SERVER['REQUEST_URI']) ?>"; // TODO? or OK

        //alert(url.search("\\?"));
        var urlParams = (url.search("\\?") != -1) ? "&" : "?";
        $.each(params, function (key, value) {
            urlParams += key + "=" + value + "&";
        });
        $.each(p3WidgetParams, function (key, value) {
            urlParams += "P3Widget[" + key + "]=" + value + "&";
        });

        //console.log(url+""+urlParams);
        window.location.href = url + urlParams;
    });


// TODO: cleanup code
var ADMIN_CONTROLS_COOKIE_NAME = 'p3widgets-admin-controls';
$('#P3WidgetContainerShowControls A')
    .click(function () {
        if($('i',this).hasClass("icon-edit"))
        {
            //alert('show');
            $('DIV.widget, DIV.widget-container').tooltip('enable') // Disable tooltips
            $.cookie(ADMIN_CONTROLS_COOKIE_NAME, 'show', {
                path: '/',
                expires: 10
            });
        }
        else
        {
            //alert('hide');
            $('DIV.widget, DIV.widget-container').tooltip('disable') // Disable tooltips
            $.cookie(ADMIN_CONTROLS_COOKIE_NAME, 'hide', {
                path: '/',
                expires: -1
            });
        }

        $('.widget-container').toggleClass('admin display', 0);
        $('i',this).toggleClass('icon-eye-open icon-edit');
        $(this).toggleClass('edit view');

    });

$('DIV.widget, DIV.widget-container').tooltip();
if ($.cookie(ADMIN_CONTROLS_COOKIE_NAME) == 'show') {
    //alert('cookie');
    $('#P3WidgetContainerShowControls A').click();
} else {
    $('DIV.widget, DIV.widget-container').tooltip('disable'); // Disable tooltips
}




// Apply sortable function to containers, handle widget movement
// Thanks & Credits to peili (http://www.yiiframework.com/extension/p3widgets/#c5563)
$(function () {
    $(".widget-container")
        .sortable({
            connectWith: ".widget-container",
            placeholder: 'ui-state-highlight',
            forcePlaceholderSize: 32,
            handle: '.handle',
            update: function () {
                var order = $(this).sortable("serialize");
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Yii::app()->controller->createUrl("/p3widgets/default/updateOrder") ?>',
                    data: order,
                    error: function (data) {
                        alert(data.responseText)
                    }
                });
            },
            stop: function (event, ui) {
                widgetId = ui.item.attr('id').replace('widget-', '');
                widgetIndex = ui.item.index();
                containerId = $(ui.item).parent().attr('id').replace('container-', '');

                var msg = 'Moving widget #' + widgetId + ' to ' + containerId + ' index ' + widgetIndex;
                console.log(msg);

                url = '<?php echo Yii::app()->controller->createUrl("/p3widgets/p3Widget/update", array("id"=>"_ID_")) ?>';
                $.post(
                    url.replace('_ID_', widgetId),
                    {
                        P3Widget: {
                            container_id: containerId,
                        }
                    },
                    function (data) {
                        console.log(data); // TODO: detection
                    }
                ).error(function () {
                        alert('Internal Server Error');
                    });
                ;
            }
        });//.disableSelection();// as the select inputs would stop working on FF;
});

// Handler for widget deletion
$('[id^=delete]')
    .click(function () {
        widgetId = $(this).attr('id').replace(/delete-/, '');
        if (confirm('Do want really want to delete widget #' + widgetId + '?')) {
            msg = 'Widget #' + widgetId;
            console.log(msg);
            url = '<?php echo Yii::app()->controller->createUrl("/p3widgets/p3Widget/delete", array("id"=>"_ID_", "ajax" => "1")) ?>';
            $.ajax({
                    type: 'POST',
                    url: url.replace(/_ID_/, widgetId),
                    data: {
                        P3Widget: {
                            id: widgetId
                        }
                    },
                    success: function (data) {
                        $('#widget-' + widgetId).hide();
                    },
                    error: function (data) {
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

$('.widget-container SPAN.cssClasses')
    .each(function (index) {
        $(this).html($(this).parent().parent().parent().parent().attr('class'));
    });
