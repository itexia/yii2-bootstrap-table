<?php
declare(strict_types=1);


namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

/**
 * Class NotificationToastrAsset
 *
 * @package itexia\bootstraptable\bundles
 */
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