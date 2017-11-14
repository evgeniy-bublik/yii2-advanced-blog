<?php

namespace app\modules\core\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Tabs extends Widget
{
    public $items;

    public function run()
    {
        $tabs     = null;
        $content  = null;

        foreach ($this->items as $index => $item) {
            $optionsLi = [];
            $optionsBlockContent = [
                'class' => 'tab-pane fade',
            ];

            if (isset($item[ 'active' ]) && $item[ 'active' ]) {
                $optionsLi = ['class' => 'active'];
                Html::addCssClass($optionsBlockContent, 'active in');
            }

            $optionsBlockContent[ 'id' ] = "pillnav{$index}";

            $tabs .= Html::beginTag('li', $optionsLi) . Html::a($item[ 'label' ], "#pillnav{$index}", ['role' => 'tab', 'data-toggle' => 'tab']) . Html::endTag('li');
            $content .= Html::beginTag('div', $optionsBlockContent) . $item[ 'content' ] . Html::endTag('div');
        }

        if ($content) {
            $content = Html::beginTag('div', ['class' => 'col-sm-9']) . Html::tag('div', $content, ['class' => 'tab-content m-t-15']) . Html::endTag('div');
            $tabs = Html::beginTag('div', ['class' => 'col-sm-3']) . Html::tag('ul', $tabs, ['class' => 'nav nav-pills nav-stacked nav-pills-primary', 'role' => 'tablist']) . Html::endTag('div');
        }

        return Html::tag('div', $content . $tabs, ['class' => 'row']);
    }
}