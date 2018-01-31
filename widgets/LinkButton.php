<?php

namespace itexia\bootstraptable\widgets;

use yii\bootstrap\Button;
use yii\bootstrap\Html;

/**
 * Class LinkButton
 *
 * @package itexia\bootstraptable\widgets
 */
class LinkButton extends Button
{

    /**
     * Icon positions
     */
    public const ICON_POSITION_LEFT = 'left';

    public const  ICON_POSITION_RIGHT = 'right';

    /**
     * @var
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

    /**
     * @return string
     */
    public function run()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;

        if ($this->icon !== null) {
            $icon = Html::tag('i', '', ['class' => $this->icon]);
            $label = strcasecmp($this->iconPosition,
              self::ICON_POSITION_LEFT) === 0 ? sprintf('%s %s', $icon,
              $label) : sprintf('%s %s', $label, $icon);
        }

        return Html::a($label, $this->url, $this->options);
    }
}