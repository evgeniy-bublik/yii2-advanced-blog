<?php

namespace app\modules\core\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;

class CrudCreateAction extends Action
{
    public $modelName;

    public $title;

    public $formView = '_form';

    public $redirectAfterAction = ['index'];

    public $template = '<div><h1>{title}</h1>{form}</div>'

    public function init()
    {
        parent::init();

        if (empty($this->modelName)) {
            throw new InvalidConfigException('<modelName> can\'t be empty');
        }
    }

    public function run()
    {
    }
}