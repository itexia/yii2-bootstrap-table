<?php
/**
 * Created by PhpStorm.
 * User: sgorzaly
 * Date: 12.02.18
 * Time: 13:25
 */

namespace itexia\bootstraptable\widgets;


use itexia\bootstraptable\bundles\AjaxRequestAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;
use yii\helpers\Url;

class AjaxLinkButton extends Widget
{

    /**
     * Icon positions
     */
    public const ICON_POSITION_LEFT = 'left';

    public const  ICON_POSITION_RIGHT = 'right';

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $encodeLabel = true;

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
    public $ajaxUrl;

    /**
     * @var array ['url']
     */
    public $url = '#';

    public $visible = true;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        AjaxRequestAsset::register($this->view);
    }

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

        if ($this->ajaxUrl !== null) {
            $this->options['ajax-url'] = $this->ajaxUrl;
        }

        echo Html::a($label, $this->url, $this->options);

        $this->registerAjaxScript();

    }

    private function registerAjaxScript()
    {
        $view = $this->getView();

        $view->registerJs("$('#" . $this->options['id'] . "[ajax-url]').unbind('click').click(
                handleAjaxLink);");
    }

}