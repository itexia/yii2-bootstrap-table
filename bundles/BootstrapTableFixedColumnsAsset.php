<?php
/**
 * Created by PhpStorm.
 * User: sgorzaly
 * Date: 05.02.18
 * Time: 11:58
 */

namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

class BootstrapTableFixedColumnsAsset extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = 'bower/bootstrap-table-fixed-columns';

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