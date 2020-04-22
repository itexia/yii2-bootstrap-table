<?php

namespace itexia\bootstraptable\widgets;

use yii\bootstrap\Button;
use yii\bootstrap\Html;

class LinkButton extends Button
{
    public const ICON_POSITION_LEFT = 'left';
    public const ICON_POSITION_RIGHT = 'right';

    /**
     * @var string
     */
    public $icon;

    /**
     * @var string Icon position.
     * Valid values are 'left', 'right'.
     */
    public $iconPosition = self::ICON_POSITION_LEFT;

    /**
     * @var array ['url']
     */
    public $url;

    public function run(): string
    {
        $label = $this->label;
        if ($this->encodeLabel) {
            $label = Html::encode($this->label);
        }

        if ($this->icon !== null) {
            $icon = Html::tag('i', '', ['class' => $this->icon]);
            $label = sprintf('%s %s', $label, $icon);
            if (0 === strcasecmp($this->iconPosition, self::ICON_POSITION_LEFT)) {
                $label = sprintf('%s %s', $icon, $label);
            }
        }

        return Html::a($label, $this->url, $this->options);
    }
}
