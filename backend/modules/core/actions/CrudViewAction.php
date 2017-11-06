<?php

namespace app\modules\core\actions;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;
use yii\base\Action;
use yii\helpers\ArrayHelper;

class CrudViewAction extends Action
{
    public $modelName;

    public $detailViewAttributes;

    public $title;

    public $deleteButtonOptions;

    public $updateButtonOptions;

    public $widgetOptions;

    public $beforeAction;

    public $primaryKey = 'id';

    public $template = '<div><h1>{title}</h1><p>{updateButton}{deleteButton}</p>{widget}</div>';

    public $viewPath = '@app/modules/core/views/crud';

    public $breadcrumbs = null;

    public $widgetClass = '\yii\widgets\DetailView';

    protected $primaryKeyValue;

    public function init()
    {
        if (empty($this->modelName)) {
            throw new InvalidConfigException("<modelName> can't be empty");
        }

        parent::init();

        $this->primaryKeyValue      = Yii::$app->request->get($this->primaryKey);
        $this->controller->viewPath = $this->viewPath;

        if (empty($this->title)) {
            $this->title = 'View';
        }

        $this->controller->view->params[ 'breadcrumbs' ]  = $this->breadcrumbs;
        $this->controller->view->title                    = $this->title;
    }

    public function run()
    {
        if ($this->beforeAction && is_callable($this->beforeAction)) {
            call_user_func([$this->beforeAction]);
        }

        $model = call_user_func_array([$this->modelName, 'findOne'], [$this->primaryKeyValue]);

        if (!$model) {
            throw new NotFoundHttpException("Model with {$this->primaryKey} = {$this->primaryKeyValue} not found");
        }

        return $this->controller->render('crud-content', [
            'content' => $this->getContent($model),
        ]);
    }

    private function generateUpdateButton()
    {
        $buttonOptions = $this->updateButtonOptions;

        $title  = ArrayHelper::remove($buttonOptions, 'title', 'Update');
        $action = ArrayHelper::remove($buttonOptions, 'action', ['update']);

        ArrayHelper::setValue($action, $this->primaryKey, $this->primaryKeyValue);

        if (!isset($buttonOptions[ 'class' ])) {
            $buttonOptions[ 'class' ] = 'btn btn-primary';
        }

        return Html::a($title, $action, $buttonOptions);
    }

    private function generateDeleteButton()
    {
        $buttonOptions = $this->deleteButtonOptions;

        $title  = ArrayHelper::remove($buttonOptions, 'title', 'Delete');
        $action = ArrayHelper::remove($buttonOptions, 'action', ['delete']);

        ArrayHelper::setValue($action, $this->primaryKey, $this->primaryKeyValue);

        if (!isset($buttonOptions[ 'class' ])) {
            $buttonOptions[ 'class' ] = 'btn btn-danger';
        }

        if (!isset($buttonOptions[ 'data' ])) {
            $buttonOptions[ 'data' ] = [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ];
        }

        return Html::a($title, $action, $buttonOptions);
    }

    private function generateWidget($model)
    {
        $widgetOptions = $this->widgetOptions;

        ArrayHelper::setValue($widgetOptions, 'model', $model);
        ArrayHelper::setValue($widgetOptions, 'attributes', $this->detailViewAttributes);

        return call_user_func_array([$this->widgetClass, 'widget'], [$widgetOptions]);
    }

    protected function getContent($model)
    {
        return strtr($this->template, [
            '{title}'         => $this->title,
            '{updateButton}'  => $this->generateUpdateButton(),
            '{deleteButton}'  => $this->generateDeleteButton(),
            '{widget}'        => $this->generateWidget($model),
        ]);
    }
}