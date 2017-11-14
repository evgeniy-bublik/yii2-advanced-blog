<?php

namespace app\modules\core\widgets;

use yii\widgets\InputWidget;
use yii\helpers\Html;

class  ToggleCheckbox extends InputWidget
{
    public function init()
    {
        $this->options[ 'label' ] = '';
    }

    public function run()
    {
        echo Html::beginTag('div', [
            'class' => 'togglebutton m-b-15',
        ]);

            echo Html::activeCheckbox($this->model, $this->attribute, $this->options);

        echo Html::endTag('div');
    }
}