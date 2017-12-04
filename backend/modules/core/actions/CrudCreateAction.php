<?php

namespace app\modules\core\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;

class CrudCreateAction extends Action
{
    public $modelName;

    public $title;

    public $beforeAction;

    public $afterAction;

    public $breadcrumbs = null;

    public $viewPath = '@app/modules/core/views/crud';

    public $formViewPath = '@app/modules/core/views/crud';

    public $formView = '_form';

    public $redirectAfterAction = ['index'];

    public $template = '<div><h1>{title}</h1>{form}</div>';

    public function init()
    {
        if (empty($this->modelName)) {
            throw new InvalidConfigException('<modelName> can\'t be empty');
        }

        parent::init();

        if (empty($this->title)) {
            $this->title = 'Create';
        }

        $this->controller->view->params[ 'breadcrumbs' ]  = $this->breadcrumbs;
        $this->controller->view->title                    = $this->title;
    }

    public function run()
    {
        $this->beforeAction();

        $model  = Yii::createObject($this->modelName);

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
            '{title}' => $this->title,
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