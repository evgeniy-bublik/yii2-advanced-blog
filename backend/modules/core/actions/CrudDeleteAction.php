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
        $primaryKeyValue = Yii::$app->request->get($this->primaryKey);

        $model = call_user_func_array([$this->modelName, 'findOne'], [$primaryKeyValue]);

        if (!$model) {
            throw new NotFoundHttpException("Model with {$this->primaryKey} = {$primaryKeyValue} not found");
        }

        $model->delete();

        return $this->controller->redirect($this->redirectAfterAction);
    }
}