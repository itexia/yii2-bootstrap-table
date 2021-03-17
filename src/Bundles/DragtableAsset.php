<?php

namespace Itexia\BootstrapTable\Bundles;

use yii\web\AssetBundle;

class DragtableAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/akottr/dragtable';

    /**
     * @var array css assets
     */
    public $css = [
        'dragtable.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'jquery.dragtable.js',
    ];
}
