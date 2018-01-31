<?php

namespace itexia\bootstraptable\widgets;


use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class BootstrapTableToolbar
 *
 * @package itexia\bootstraptable\widgets
 */
class BootstrapTableToolbar extends Widget
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var array
     */
    public $toolbarButtons;

    /**
     * Inits widget
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Runs the widget.
     *
     * @return string
     */
    public function run()
    {
        $html = Html::tag('div', implode('', $this->toolbarButtons), [
          'id'          => $this->id,
          'class'       => 'btn-group btn-group-devided',
          'data-toggle' => 'buttons',
        ]);

        return $html;
    }
}