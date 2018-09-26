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
        type: 'post',
        dataType: 'json',
        beforeSend: function(xhr, opts){
            if ($link.attr('id') === 'delete') {
                var xconfirm = confirm('Möchten Sie diese Datensätze wirklich löschen?');
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
            $tableOptions.summaryData.selectedAll = false;
            $tableOptions.summaryData.rowIds = [];

            if (callbackFunction && typeof window[callbackFunction] === 'function') {
                window[callbackFunction]();
            }

            toastr[res.type](res.message, res.title, res.options);
        },
        error: function (xhr, status, error) {
            console.log('ajax error');
            console.log(xhr);
            console.log(xhr.responseText);
        },
        complete: function (xhr) {
            // console.log('ajax complete');
            // console.log(xhr);
        }
    });
}

