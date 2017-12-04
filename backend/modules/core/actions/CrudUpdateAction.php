<?php

namespace app\modules\core\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;

class CrudUpdateAction extends Action
{
    public $modelName;

    public $model;

    public $title;

    public $beforeAction;

    public $afterAction;

    public $primaryKey = 'id';

    public $breadcrumbs = null;

    public $viewPath = '@app/modules/core/views/crud';

    public $formViewPath = '@app/modules/core/views/crud';

    public $formView = '_form';

    public $redirectAfterAction = ['index'];

    public $template = '<div><h1>{title}</h1>{form}</div>';

    private $primaryKeyValue;

    public function init()
    {
        if (empty($this->modelName) && empty($this->model)) {
            throw new InvalidConfigException('modelName or model must be set');
        }

        parent::init();

        $this->primaryKeyValue = Yii::$app->request->get($this->primaryKey);

        if (empty($this->title)) {
            $this->title = 'Update';
        }

        $this->controller->view->params[ 'breadcrumbs' ]  = $this->breadcrumbs;
        $this->controller->view->title                    = $this->title;
    }

    public function run()
    {
        $this->beforeAction();

        if ($this->model) {
            $model = $this->model;
        } else {
            $model = call_user_func_array([$this->modelName, 'findOne'], [$this->primaryKeyValue]);

            if (!$model) {
                throw new NotFoundHttpException("Model with {$this->primaryKey} = {$this->primaryKeyValue} not found");
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->afterAction();

            return $this->controller->redirect($this->redirectAfterAction);
        }

        $this->controller->viewPath = $this->formViewPath;

        $form = $this->controller->renderPartial($this->formView, [
            'model' => $model,
        ]);

        $this->controller->viewPath = $this->viewPath;

        return $this->controller->render('crud-content', [
            'content' => $this->getContent($form),
        ]);
    }

    protected function getContent($form)
    {
        return strtr($this->template, [
            '{title}'   => $this->title,
            '{form}'  => $form,
        ]);
    }

    private function beforeAction()
    {
        if ($this->beforeAction && is_callable($this->beforeAction)) {
            call_user_func($this->beforeAction);
        }
    }

    private function afterAction()
    {
        if ($this->afterAction && is_callable($this->afterAction)) {
            call_user_func($this->afterAction);
        }
    }
}