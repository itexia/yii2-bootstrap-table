function handleAjaxLink(e) {
    'use strict';
    var $link = $(e.target),
        targetUrl = $link.attr('ajax-url'),
        $tableOptions = $.fn.bootstrapTable.defaults,
        callbackFunction = $link.attr('callback-function');

    if (!targetUrl) {
        targetUrl = $link.attr('href');
    }

    e.preventDefault();

    $.ajax({
        url: targetUrl,
        type: 'post',
        dataType: 'json',
        beforeSend: function (xhr, opts) {
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
        },
        complete: function (xhr) {
        }
    });
}

