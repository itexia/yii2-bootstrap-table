<?php

declare(strict_types=1);

namespace Itexia\BootstrapTable\Bundles;

use yii\web\AssetBundle;

class NotificationToastrAsset extends AssetBundle
{
    public $sourcePath = '@bower/toastr';

    /**
     * @var array
     */
    public $js = [
        'toastr.min.js',
    ];

    /**
     * @var array
     */
    public $css = [
        'toastr.min.css',
    ];
}
