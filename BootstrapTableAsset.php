<?php
/**
 * Created by PhpStorm.
 * User: sgorzaly
 * Date: 25.01.18
 * Time: 17:50
 */

namespace itexia\bootstraptable;


use yii\web\AssetBundle;

class BootstrapTableAsset extends AssetBundle
{

    public $sourcePath = '@bower/bootstrap-table/dist';

    public $css = [
      'bootstrap-table.min.css',
      'extensions/reorder-rows/bootstrap-table-reorder-rows.css',
    ];

    public $js = [
      'bootstrap-table.min.js',
      'extensions/filter-control/bootstrap-table-filter-control.min.js',
      'extensions/export/bootstrap-table-export.min.js',
      'extensions/reorder-columns/bootstrap-table-reorder-columns.js',
    ];

    public $depends = [
      'yii\bootstrap\BootstrapAsset',
    ];
}