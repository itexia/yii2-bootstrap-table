<?php

namespace Itexia\BootstrapTable\Bundles;

use yii\web\AssetBundle;

class AjaxRequestAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/itexia/yii2-bootstrap-table/assets';

    /**
     * @var array
     */
    public $js = [
        'handleAjaxRequest.js',
    ];
}
