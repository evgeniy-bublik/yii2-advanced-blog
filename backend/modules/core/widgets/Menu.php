<?php

namespace app\modules\core\widgets;

use yii\widgets\Menu as YiiBaseMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends YiiBaseMenu
{
    public $firtsItemSubmenuTemplate = '<a href="#">{label}</a>';

    /**
     * Recursively renders the menu items (without the container tag).
     * @param array $items the menu items to be rendered recursively
     * @return string the rendering result
     */
    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            Html::addCssClass($options, $class);

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);
    }

    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item)
    {
        $iconOptions  = ArrayHelper::getValue($item, 'iconOptions', null);
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

        if (isset($item[ 'items' ])) {
            $template = ArrayHelper::getValue($item, 'template', $this->firtsItemSubmenuTemplate);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
        }

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