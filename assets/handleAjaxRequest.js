function handleAjaxLink(e) {
    'use strict';
    var $link = $(e.target);
    var targetUrl = $link.attr('ajax-url');
    if (!targetUrl) {
        targetUrl = $link.attr('href');
    }
    var $tableOptions = $.fn.bootstrapTable.defaults;
    var ajaxRequest;

    var callbackFunction = $link.attr('callback-function');

    e.preventDefault();

    $.ajax({
        url: targetUrl,
        type: "post",
        dataType: 'json',
        beforeSend: function(xhr, opts){
            if ($link.attr('id') === 'delete') {
                var xconfirm = confirm(getTranslation("InvInterface", "Möchten Sie diese Datensätze wirklich löschen?"));
                if (xconfirm !== true) {
                    xhr.abort();
                    return false;
                }
            }
        },
        data: {
            allSelected: $tableOptions.summaryData.selectedAll,
            ids: JSON.stringify($tableOptions.summaryData.rowIds)
        },
        success: function (res) {
            console.log('ajax success');
            console.log(res);

            if (callbackFunction && typeof window[callbackFunction] === 'function') {
                window[callbackFunction]();
            }
        },
        error: function (xhr, status, error) {
            console.log('ajax error');
            console.log(xhr);
            console.log(xhr.responseText);
        },
        complete: function (xhr) {
            console.log('ajax complete');
            console.log(xhr);
        }
    });
    console.log(JSON.stringify($tableOptions.summaryData));
    console.log(targetUrl);
    console.log($tableOptions.summaryData.selectedAll);
    console.log($tableOptions.summaryData.rowIds);
}


function getTranslation(category, message, params) {
    // TODO: does not exist yet?
    ajaxRequest = $.ajax({
        url: 'get-translation',
        type: "post",
        async: false,
        dataType: 'json',
        data: {
            category: category,
            message: message,
            params: JSON.stringify(params)
        },
        success: function (response) {
            message = response;
        },
        error: function (e) {
        }
    });

    return message;
}