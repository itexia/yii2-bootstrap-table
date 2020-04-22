<?php

namespace Itexia\BootstrapTable\Components;

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

    public function init(): void
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * @throws Exception
     */
    public function run(): string
    {
        parent::run();

        if ($this->isAjaxButton) {
            return AjaxSubmitButton::widget($this->buttonConfig);
        }

        // todo: does not work
        return LinkButton::widget($this->buttonConfig);
    }
}
