<?php
/**
 * Created by PhpStorm.
 * User: sgorzaly
 * Date: 12.02.18
 * Time: 14:08
 */

namespace itexia\bootstraptable\bundles;


use yii\web\AssetBundle;

class AjaxRequestAsset extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = '@vendor/itexia/yii2-bootstrap-table/assets';

    /**
     * @var array js assets
     */
    public $js = [
      'handleAjaxRequest.js',
    ];
}