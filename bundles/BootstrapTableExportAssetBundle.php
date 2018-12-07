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
    public $sourcePath = '@vendor/hhurz/tableExport.jquery.plugin';

    /**
     * @var array js assets
     */
    public $js = [
        'libs/FileSaver/FileSaver.min.js',
        'libs/js-xlsx/xlsx.core.min.js',
        'libs/jspdf/jspdf.min.js',
        'libs/jsPDF-AutoTable/jspdf.plugin.autotable.js',
//        'tableExport.min.js',
        'tableExport.js',
    ];

    /**
     * @var array
     */
    public $depends = [
      'dlds\metronic\bundles\CoreAsset',
    ];
}