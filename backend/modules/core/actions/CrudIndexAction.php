<?php

namespace app\modules\core\actions;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\base\Action;

class CrudIndexAction extends Action
{
    public $searchModelName;

    public $dataProvider;

    public $columnsGridView;

    public $title;

    public $userHtmlAddButtonOptions = [];

    public $userAddButtonOptions = [];

    public $methodSearch = 'search';

    public $breadcrumbs = null;

    public $viewPath = '@app/modules/core/views/crud';

    public $template = '<div><h1>{title}</h1><p>{createButton}</p>{widget}</div>';

    public $widgetClass = '\yii\grid\GridView';

    public $userWidgetOptions = [];

    protected $searchModel;

    protected $defaultAddButtonOptions = [
        'title'   => 'Create',
        'action'  => ['create'],
    ];

    protected $defaultHtmlAddButtonOptions = [
        'class' => 'btn btn-success',
    ];

    public function init()
    {
        if (empty($this->searchModelName) && empty($this->dataProvider)) {
            throw new InvalidConfigException("attribute <searchModelName> or <dataProvider> must be set");
        }

        parent::init();

        $this->controller->viewPath     = $this->viewPath;
        $this->controller->view->title  = $this->title;

        if (!empty($this->searchModelName)) {
            $this->searchModel              = Yii::createObject($this->searchModelName);
        }

        if (empty($this->title)) {
            $this->title = 'List';
        }

        if (!empty($this->breadcrumbs)) {
            $this->controller->view->params[ 'breadcrumbs' ][] = $this->breadcrumbs;
        }

        if (empty($this->columnsGridView) && !empty($this->searchModel)) {
            $this->columnsGridView = $this->searchModel->attributes();
        }
    }

    public function run()
    {
        if ($this->searchModel) {
            $dataProvider = call_user_func_array([$this->searchModel, $this->methodSearch], [Yii::$app->request->queryParams]);
        } else {
            $dataProvider = $this->dataProvider;
        }

        $widgetOptions = [
            'dataProvider'  => $dataProvider,
            'columns'       => $this->columnsGridView,
        ];

        if ($this->searchModel) {
            $widgetOptions[ 'filterModel' ] = $this->searchModel;
        }

        $widgetOptions = array_merge($widgetOptions, $this->userWidgetOptions);

        return $this->controller->render('crud-content', [
            'content' => $this->getContent($widgetOptions),
        ]);
    }

    protected function generateCreateButton()
    {
        $buttonOptions      = array_merge($this->defaultAddButtonOptions, $this->userAddButtonOptions);
        $buttonHtmlOptions  = array_merge($this->defaultHtmlAddButtonOptions, $this->userHtmlAddButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    protected function getContent($widgetOptions)
    {
        return strtr($this->template, [
            '{title}'         => $this->title,
            '{createButton}'  => $this->generateCreateButton(),
            '{widget}'        => call_user_func_array([$this->widgetClass, 'widget'], [$widgetOptions]),
        ]);
    }
}
?>