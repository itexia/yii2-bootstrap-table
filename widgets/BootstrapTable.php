<?php

namespace itexia\bootstraptable\widgets;

use itexia\bootstraptable\bundles\BootstrapTableAsset;
use ReflectionClass;
use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap\Html;
use yii\grid\GridView;

class BootstrapTable extends GridView
{
    /**
     * @var array
     *
     * see also: http://bootstrap-table.wenzhixin.net.cn/documentation/ for
     *   additional table options
     */
    private static $defaultTableOptions = [
        'data-active-filters' => 'false',
        'data-ajax-url' => 'data',
        'data-append' => 'true',
        'data-buttons-class' => 'btn btn-circle',
        'data-click-to-select' => 'true',
        'data-content-type' => 'application/json',
        'data-cookie' => 'true',
        'data-cookie-id-table' => 'saveTableSettings',
        'data-export-types' => ['csv', 'excel'],
        'data-export-data-type' => 'all',
        'data-filter-control' => 'true',
        'data-id-field' => 'id',
        'data-infinite-scrolling' => 'true',
        'data-max-moving-rows' => '100',
        'data-method' => 'post',
        'data-page-number' => '1',
        'data-page-size' => '10',
        'data-reorderable-columns' => 'true',
        'data-show-columns' => 'true',
        'data-show-export' => 'true',
        'data-side-pagination' => 'server',
        'data-toggle' => 'table',
        'data-total-field' => 'total',
    ];

    /**
     * @var array
     *
     * see also: http://bootstrap-table.wenzhixin.net.cn/documentation/ for
     *   additional column options.
     */
    private static $defaultHeaderOptions = [
        'data-filter-control' => 'select',
        'data-sortable' => 'true',
        'data-switchable' => 'true',
    ];

    public $rowCheckboxSelect = true;

    /**
     * @throws InvalidConfigException
     */
    public function init(): void
    {
        $this->id = $this->getId();
        parent::init();

        $this->setTableOptions();

        BootstrapTableAsset::register($this->view);
    }

    private function setTableOptions(): array
    {
        $settings = self::$defaultTableOptions;
        $settings['data-locale'] = 'en-GB';
        if (!empty(Yii::$app->language)) {
            $settings['data-locale'] = Yii::$app->language;
        }

        return $this->tableOptions = array_merge($this->tableOptions, $settings);
    }

    public function run(): string
    {
        $sHeader = $this->renderTableHeader();

        return $this->renderTable($sHeader);
    }

    public function renderTableHeader(): string
    {
        $html = [];

        if ($this->rowCheckboxSelect) {
            $html[] = $this->addColumnCheckboxSelect();
        }

        foreach ($this->columns as $column) {
            $html[] = $this->renderTableHeaderCell($this->setHeaderOptions($column));
        }

        // remove data-toggle for tr or bootstrap table would init() twice!
        $trOptions = $this->tableOptions;
        unset($trOptions['data-toggle']);
        $content = Html::tag('tr', implode("\n", $html), $trOptions);

        return Html::tag('thead', $content, []);
    }

    private function addColumnCheckboxSelect(): string
    {
        return Html::tag(
            'th',
            '',
            [
                'data-field' => 'state',
                'data-checkbox' => 'true',
            ]
        );
    }

    private function renderTableHeaderCell($cell): string
    {
        return Html::tag('th', $cell->label, $cell->headerOptions);
    }

    private function setHeaderOptions($column)
    {
        $columnClass = (new ReflectionClass($column))->getShortName();
        switch ($columnClass) {
            case 'ActionColumn':
                $column->headerOptions = [
                    'data-field' => 'action',
                    'data-filter-control' => 'false',
                    'data-searchable' => 'false',
                    'data-sortable' => 'false',
                    'data-switchable' => 'false',
                ];
                break;
        }

        $column->headerOptions = array_merge(
            self::$defaultHeaderOptions,
            $column->headerOptions
        );

        return $column;
    }

    private function renderTable($html = '<thead></thead>'): string
    {
        return Html::tag('table', $html, $this->tableOptions);
    }

}
