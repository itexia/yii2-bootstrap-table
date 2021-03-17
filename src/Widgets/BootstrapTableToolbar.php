<?php

namespace Itexia\BootstrapTable\Widgets;

use yii\base\Widget;
use yii\helpers\Html;

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

    public function init(): void
    {
        parent::init();
    }

    public function run(): string
    {
        return Html::tag(
            'div',
            implode('', $this->toolbarButtons),
            [
                'id' => $this->id,
                'class' => 'btn-group btn-group-devided',
                'data-toggle' => 'buttons',
            ]
        );
    }
}
