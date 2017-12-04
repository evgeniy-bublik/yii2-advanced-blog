<?php

namespace app\modules\core\actions;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\base\Action;
use yii\helpers\ArrayHelper;

class CrudIndexAction extends Action
{
    public $searchModelName;

    public $dataProvider;

    public $gridColumns;

    public $title;

    public $createButtonOptions;

    public $widgetOptions;

    public $beforeAction;

    public $methodSearch = 'search';

    public $breadcrumbs = null;

    public $viewPath = '@app/modules/core/views/crud';

    public $template = '<div><h1>{title}</h1><p>{createButton}</p>{widget}</div>';

    public $widgetClass = '\yii\grid\GridView';

    protected $searchModel;

    public function init()
    {
        if (empty($this->searchModelName) && empty($this->dataProvider)) {
            throw new InvalidConfigException("attribute <searchModelName> or <dataProvider> must be set");
        }

        parent::init();

        $this->controller->viewPath = $this->viewPath;

        if (!empty($this->searchModelName)) {
            $this->searchModel              = Yii::createObject($this->searchModelName);
        }

        if (empty($this->title)) {
            $this->title = 'List items';
        }

        if (empty($this->gridColumns) && !empty($this->searchModel)) {
            $columns = [
                ['class' => 'yii\grid\SerialColumn']
            ];

            $columns = ArrayHelper::merge($columns, $this->searchModel->attributes());

            $columns = ArrayHelper::merge($columns, [[
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
            ]]);

            $this->gridColumns = $columns;
        }

        $this->controller->view->params[ 'breadcrumbs' ]  = $this->breadcrumbs;
        $this->controller->view->title                    = $this->title;
    }

    public function run()
    {
        $this->beforeAction();

        return $this->controller->render('crud-content', [
            'content' => $this->getContent(),
        ]);
    }

    private function generateCreateButton()
    {
        $buttonOptions = $this->createButtonOptions;

        $title  = ArrayHelper::remove($buttonOptions, 'title', 'Create');
        $action = ArrayHelper::remove($buttonOptions, 'action', ['create']);

        if (!isset($buttonOptions[ 'class' ])) {
            $buttonOptions[ 'class' ] = 'btn btn-success';
        }

        return Html::a($title, $action, $buttonOptions);
    }

    private function generateWidget()
    {
        if ($this->searchModel) {
            $dataProvider = call_user_func_array([$this->searchModel, $this->methodSearch], [Yii::$app->request->queryParams]);
        } else {
            $dataProvider = $this->dataProvider;
        }

        $widgetOptions = $this->widgetOptions;

        ArrayHelper::setValue($widgetOptions, 'dataProvider', $dataProvider);
        ArrayHelper::setValue($widgetOptions, 'columns', $this->gridColumns);

        if ($this->searchModel) {
            ArrayHelper::setValue($widgetOptions, 'filterModel', $this->searchModel);
        }

        return call_user_func_array([$this->widgetClass, 'widget'], [$widgetOptions]);
    }

    protected function getContent()
    {
        return strtr($this->template, [
            '{title}'         => $this->title,
            '{createButton}'  => $this->generateCreateButton(),
            '{widget}'        => $this->generateWidget(),
        ]);
    }

    private function beforeAction()
    {
        if ($this->beforeAction && is_callable($this->beforeAction)) {
            call_user_func($this->beforeAction);
        }
    }
}
?>