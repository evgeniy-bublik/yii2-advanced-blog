<?php

namespace app\modules\core\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\base\InvalidConfigException;

class CrudDeleteAction extends Action
{
    public $primaryKey = 'id';

    public $redirectAfterAction = ['index'];

    public $beforeAction;

    public $afterAction;

    public $modelName;

    public function init()
    {
        parent::init();

        if (empty($this->modelName)) {
            throw new InvalidConfigException('<modelName> can\'t be empty');
        }
    }

    public function run()
    {
        $this->beforeAction();

        $primaryKeyValue = Yii::$app->request->get($this->primaryKey);

        $model = call_user_func_array([$this->modelName, 'findOne'], [$primaryKeyValue]);

        if (!$model) {
            throw new NotFoundHttpException("Model with {$this->primaryKey} = {$primaryKeyValue} not found");
        }

        $model->delete();

        $this->afterAction();

        return $this->controller->redirect($this->redirectAfterAction);
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