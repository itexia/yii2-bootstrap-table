<?php

namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

/**
 * Class DragtableAssetBundle
 *
 * @package itexia\bootstraptable\bundles
 */
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