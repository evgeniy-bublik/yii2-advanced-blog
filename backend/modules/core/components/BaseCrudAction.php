<?php

namespace app\modules\core\components;

use Yii;
use yii\base\Action;

class BaseCrudAction extends Action
{
    public $title;
    public $viewPath = '@app/modules/core/views/crud';
}