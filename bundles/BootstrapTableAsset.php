<?php

namespace itexia\bootstraptable\bundles;

use yii\web\AssetBundle;

/**
 * Class BootstrapTableAsset
 *
 * @package itexia\bootstraptable\bundles
 */
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
//      'extensions/filter-control/bootstrap-table-filter-control.js',
      'extensions/editable/bootstrap-table-editable.min.js',
      'extensions/export/bootstrap-table-export.min.js',
      'extensions/reorder-columns/bootstrap-table-reorder-columns.js',
      'extensions/reorder-rows/bootstrap-table-reorder-rows.js',
      'extensions/cookie/bootstrap-table-cookie.js',
    ];

    /**
     * @var array
     */
    public $depends = [
      'itexia\bootstraptable\bundles\BootstrapTableExportAssetBundle',
      'itexia\bootstraptable\bundles\DragtableAsset',
      'itexia\bootstraptable\bundles\DateRangePickerAsset',
//      'itexia\bootstraptable\bundles\BootstrapTableFixedColumnsAsset', // depends on bootstrap-table.js but is included before!
      'yii\web\JqueryAsset',
      'yii\bootstrap\BootstrapAsset',
      NotificationToastrAsset::class,
    ];
}