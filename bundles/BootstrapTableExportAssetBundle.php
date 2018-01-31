<?php

namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

/**
 * Class BootstrapTableExportAssetBundle
 *
 * @package itexia\bootstraptable\bundles
 */
class BootstrapTableExportAssetBundle extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = '@vendor/itexia/yii2-bootstrap-table/assets';

    /**
     * @var array css assets
     */
    public $css = [
      'bootstrap-table/jquery.dragtable.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
      'bootstrap-table/jquery.dragtable.js',
      'bootstrap-table/extensions/tableExport/tableExport.js',
      'bootstrap-table/extensions/tableExport/jquery.base64.js',
      'bootstrap-table/extensions/tableExport/html2canvas.js',
    ];

    /**
     * @var array
     */
    public $depends = [
      'dlds\metronic\bundles\CoreAsset',
    ];
}