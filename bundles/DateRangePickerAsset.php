<?php
/**
 * Created by PhpStorm.
 * User: sgorzaly
 * Date: 05.02.18
 * Time: 09:57
 */

namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

class DateRangePickerAsset extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = '@vendor/kartik-v/yii2-date-range/assets';

    /**
     * @var array css assets
     */
    public $css = [
      'css/daterangepicker.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
      'js/daterangepicker.js',
    ];
}