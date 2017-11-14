<?php

namespace app\modules\core\widgets;

use yii\widgets\Menu as YiiBaseMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends YiiBaseMenu
{
    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item)
    {
        $iconOptions  = ArrayHelper::getValue($item, 'icon', null);
        $iconTag      = null;

        if ($iconOptions) {
            $iconTag = ArrayHelper::remove($iconOptions, 'tag', 'i');
        }

        if (isset($item[ 'url' ])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            if ($iconTag) {
                $template = strtr($template, [
                    '{icon}' => Html::tag($iconTag, '', $iconOptions),
                ]);
            } else {
                $template = strtr($template, [
                    '{icon}' => null,
                ]);
            }

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
            ]);
        }

        $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

        if ($iconTag) {
            $template = strtr($template, [
                '{icon}' => Html::tag($iconTag, '', $iconOptions),
            ]);
        } else {
            $template = strtr($template, [
                '{icon}' => null,
            ]);
        }

        return strtr($template, [
            '{label}' => $item['label'],
        ]);
    }
}