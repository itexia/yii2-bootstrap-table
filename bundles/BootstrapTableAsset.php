<?php

namespace itexia\bootstraptable\bundles;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\bootstrap\BootstrapAsset;

class BootstrapTableAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/bootstrap-table/dist';

    /**
     * @var array
     */
    public $css = [
        'bootstrap-table.min.css',
        'extensions/filter-control/bootstrap-table-filter-control.css',
        'extensions/reorder-rows/bootstrap-table-reorder-rows.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'bootstrap-table.js',
        'extensions/editable/bootstrap-table-editable.min.js',
        'extensions/export/bootstrap-table-export.js',
        'extensions/reorder-columns/bootstrap-table-reorder-columns.js',
        'extensions/reorder-rows/bootstrap-table-reorder-rows.js',
        'extensions/cookie/bootstrap-table-cookie.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        BootstrapTableExportAssetBundle::class,
        DragtableAsset::class,
        DateRangePickerAsset::class,
        JqueryAsset::class,
        BootstrapAsset::class,
        NotificationToastrAsset::class,
    ];
}
