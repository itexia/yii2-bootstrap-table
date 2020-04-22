<?php

namespace itexia\bootstraptable\bundles;

use yii\web\AssetBundle;

class BootstrapTableExportAssetBundle extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/hhurz/tableExport.jquery.plugin';

    /**
     * @var array
     */
    public $js = [
        'libs/FileSaver/FileSaver.min.js',
        'libs/js-xlsx/xlsx.core.min.js',
        'libs/jspdf/jspdf.min.js',
        'libs/jsPDF-AutoTable/jspdf.plugin.autotable.js',
        'tableExport.js',        
        'jquery.base64.js',
        'jspdf/libs/sprintf.js',
        'jspdf/libs/base64.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dlds\metronic\bundles\CoreAsset',
    ];
}
