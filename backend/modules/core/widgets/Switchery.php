<?php

namespace app\modules\core\widgets;

use yii\widgets\InputWidget;
use yii\helpers\Html;
use app\assets\SwitcheryAsset;

class  Switchery extends InputWidget
{
    const SIZE_SMALL = 'small';

    const SIZE_LARGE = 'large';

    public $color = '#1bb99a';

    public $secondaryColor = null;

    public $size = null;

    public function init()
    {
        parent::init();

        if (!is_null($this->size)) {
            switch($this->size) {
                case self::SIZE_LARGE:
                    $this->options[ 'data-size' ] = self::SIZE_LARGE;
                    break;
                default:
                    $this->options[ 'data-size' ] = self::SIZE_SMALL;
            }
        }

        if (!is_null($this->secondaryColor)) {
            $this->options[ 'data-secondary-color' ] = $this->secondaryColor;
        }

        $this->options[ 'data-color' ] = $this->color;
        $this->options[ 'data-plugin' ] = 'switchery';
    }

    public function run()
    {
        $this->registerAssets();

        echo Html::beginTag('div', [
            'class' => 'switchery-demo',
        ]);

            echo Html::activeCheckbox($this->model, $this->attribute, $this->options);

        echo Html::endTag('div');
    }

    private function registerAssets()
    {
        SwitcheryAsset::register($this->getView());
    }
}