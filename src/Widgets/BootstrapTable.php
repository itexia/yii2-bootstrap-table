<?php

namespace Itexia\BootstrapTable\Widgets;

use Itexia\BootstrapTable\Bundles\BootstrapTableAsset;
use ReflectionClass;
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
        'data-buttons-class' => 'btn btn-circle',
        'data-filter-control' => 'true',
        'data-active-filters' => 'false',
        'data-toggle' => 'table',
        'data-show-export' => 'true',
        'data-export-types' => ['pdf', 'csv', 'excel'],
        'data-export-data-type' => 'all',
        'data-show-columns' => 'true',
        'data-reorderable-columns' => 'true',
        'data-max-moving-rows' => '100',
        'data-ajax-url' => 'data',
        'data-click-to-select' => 'true',
        'data-total-field' => 'total',
        'data-side-pagination' => 'server',
        'data-page-size' => '10',
        'data-page-number' => '1',
        'data-infinite-scrolling' => 'true',
        'data-append' => 'true',
        'data-method' => 'post',
        'data-content-type' => 'application/json',
        'data-id-field' => 'id',
        'data-cookie' => 'true',
        'data-cookie-id-table' => 'saveTableSettings',
        'data-locale' => 'en-GB'
    ];

    /**
     * @var array
     *
     * see also: http://bootstrap-table.wenzhixin.net.cn/documentation/ for
     *   additional column options.
     */
    private static $defaultHeaderOptions = [
        'data-sortable' => 'true',
        'data-switchable' => 'true',
        'data-filter-control' => 'select',
    ];

    /**
     * @var bool True to show a checkbox column
     */
    public $rowCheckboxSelect = true;

    /**
     * Inits widget
     */
    public function init()
    {
        $this->id = $this->getId();
        parent::init();

        $this->setTableOptions();

        BootstrapTableAsset::register($this->view);
    }

    /**
     * Initialize table options.
     *
     * @return array
     */
    private function setTableOptions()
    {
        return $this->tableOptions = array_merge(self::$defaultTableOptions, $this->tableOptions);
    }

    /**
     * Run widget.
     *
     * @return string|void
     */
    public function run()
    {
        $sHeader = $this->renderTableHeader();

        echo $this->renderTable($sHeader);
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

    /**
     * Renders table header cell.
     *
     * @param $cell
     *
     * @return string
     */
    private function renderTableHeaderCell($cell): string
    {
        return Html::tag(
            'th',
            $cell->label,
            $cell->headerOptions
        );
    }

    /**
     * Initialize column header options.
     *
     * @param $column
     *
     * @return mixed
     */
    private function setHeaderOptions($column)
    {
        $columnClass = (new ReflectionClass($column))->getShortName();
        if ('ActionColumn' === $columnClass) {
            $column->headerOptions = [
                'data-field' => 'action',
                'data-switchable' => 'false',
                'data-sortable' => 'false',
                'data-searchable' => 'false',
                'data-filter-control' => 'false',
            ];
        }

        $column->headerOptions = array_merge(
            self::$defaultHeaderOptions,
            $column->headerOptions
        );

        return $column;
    }

    /**
     * Renders table.
     *
     * @param string $html
     *
     * @return string
     */
    private function renderTable($html = '<thead></thead>'): string
    {
        return Html::tag('table', $html, $this->tableOptions);
    }
}
