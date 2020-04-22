<?php

namespace itexia\bootstraptable\components;

use demogorgorn\ajax\AjaxSubmitButton;
use Exception;
use itexia\bootstraptable\widgets\LinkButton;
use yii\base\Widget;

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

    public function __construct(array $config = [])
    {
        if (isset($config['isAjaxButton'])) {
            $this->isAjaxButton = $config['isAjaxButton'];
            unset($config['isAjaxButton']);
        }

        $this->buttonConfig = $config;
    }

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
        echo LinkButton::widget($this->buttonConfig);

    }
}