<?php

namespace itexia\bootstraptable\bundles;

use yii\web\AssetBundle;

class BootstrapTableFixedColumnsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/bower-asset/bootstrap-table-fixed-columns';

    /**
     * @var array
     */
    public $css = [
        'bootstrap-table-fixed-columns.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'bootstrap-table-fixed-columns.js',
    ];
}
