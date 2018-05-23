function handleAjaxLink(e) {
    'use strict';
    var $link = $(e.target);
    var targetUrl = $link.attr('ajax-url');
    if (!targetUrl) {
        targetUrl = $link.attr('href');
    }
    var $tableOptions = $.fn.bootstrapTable.defaults;
    var ajaxRequest;

    e.preventDefault();

    $.ajax({
        url: targetUrl,
        type: "post",
        dataType: 'json',
        data: {
            allSelected: $tableOptions.summaryData.selectedAll,
            ids: JSON.stringify($tableOptions.summaryData.rowIds)
        },
        sucess: function (res) {
            console.log('success');
            console.log(res);
        },
        error: function (xhr, status, error) {
            console.log(xhr);
            console.log(xhr.responseText);
        },
        complete: function (xhr) {
            console.log(xhr);
        }
    });
    console.log(JSON.stringify($tableOptions.summaryData));
    console.log(targetUrl);
    console.log($tableOptions.summaryData.selectedAll);
    console.log($tableOptions.summaryData.rowIds);
}