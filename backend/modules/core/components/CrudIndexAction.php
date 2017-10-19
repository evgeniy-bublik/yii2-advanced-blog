<?php

namespace app\modules\core\components;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

class CrudIndexAction extends BaseCrudAction
{
    public $searchModelName;
    public $userHtmlAddButtonOptions = [];
    public $userAddButtonOptions = [];
    public $columnsGridView = [];

    public $methodSearch      = 'search';
    public $breadcrumbs       = null;
    public $template          = '<div><h1>{title}</h1><p>{createButton}</p>{widget}</div>';


    protected $defaultAddButtonOptions = [
        'title'   => 'Create',
        'action'  => ['create'],
    ];

    protected $defaultHtmlAddButtonOptions = [
        'class' => 'btn btn-success',
    ];

    public function init()
    {
        parent::init();

        $this->controller->viewPath     = $this->viewPath;
        $this->controller->view->title  = $this->title;

        $this->controller->view->params[ 'breadcrumbs' ][] = (empty($this->breadcrumbs)) ? $this->title : $this->breadcrumbs;

        if (empty($this->title)) {
            $title = 'List';
        }
    }

    public function run()
    {
        $searchModel  = new $this->searchModelName();
        $dataProvider = call_user_func_array([$searchModel, $this->methodSearch], [Yii::$app->request->queryParams]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $widgetOptions = [
            'filterModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
            'columns'       => $this->columnsGridView,
        ];

        return $this->controller->render('crud-content', [
            'content' => $this->getContent($widgetOptions),
        ]);
    }

    private function generateCreateButton()
    {
        $buttonOptions      = array_merge($this->defaultAddButtonOptions, $this->userAddButtonOptions);
        $buttonHtmlOptions  = array_merge($this->defaultHtmlAddButtonOptions, $this->userHtmlAddButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    private function getContent($widgetOptions)
    {
        return strtr($this->template, [
            '{title}'         => $this->title,
            '{createButton}'  => $this->generateCreateButton(),
            '{widget}'        => call_user_func_array(['\yii\grid\GridView', 'widget'], [$widgetOptions]),
        ]);
    }
}
?>