<?php

namespace app\modules\core\widgets;

use yii\base\Widget;
use app\modules\core\models\TextBlock;
use yii\helpers\Html;

/**
 * Text block widget witch find text block raw by unique code.
 * If text block find, widget return text block text
 */
class TextBlockWidget extends Widget
{
    /**
     * @var string $code Code string
    */
    public $code;

    /**
     * {@inheritdoc}.
     *
     * @return string|null
     */
    public function run()
    {
        $textBlock = TextBlock::findOne([
            'code' => $this->code,
            'active' => 1,
        ]);

        if (!$textBlock) {
            return null;
        }

        return Html::encode($textBlock->text);
    }
}
