<?php

namespace itexia\bootstraptable\components;


use demogorgorn\ajax\AjaxSubmitButton;
use yii\base\Widget;
use yii\bootstrap\Button as BaseButton;

/**
 * Class Button
 *
 * @package itexia\bootstraptable\components
 */
class Button extends Widget
{

    /**
     * @var bool
     */
    public $isAjaxButton = false;

    /**
     * @var array
     */
    private $buttonConfig;


    /**
     * Button constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['isAjaxButton'])) {
            $this->isAjaxButton = $config['isAjaxButton'];
            unset($config['isAjaxButton']);
        }

        $this->buttonConfig = $config;
    }

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @return string|void
     * @throws \Exception
     */
    public function run()
    {
        parent::run();

        if ($this->isAjaxButton) {
            echo AjaxSubmitButton::widget($this->buttonConfig);
            return;
        }

        // todo: does not work
        echo BaseButton::widget($this->buttonConfig);

    }
}