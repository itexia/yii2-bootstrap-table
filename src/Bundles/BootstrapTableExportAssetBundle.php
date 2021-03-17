<?php

namespace Itexia\BootstrapTable\Bundles;

use yii\web\AssetBundle;

class BootstrapTableExportAssetBundle extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/kayalshri/tableExport.jquery.plugin';

    /**
     * @var array
     */
    public $js = [
        'tableExport.js',
        'jquery.base64.js',
        'jspdf/libs/sprintf.js',
        'jspdf/jspdf.js',
        'jspdf/libs/base64.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dlds\metronic\bundles\CoreAsset',
    ];
}
