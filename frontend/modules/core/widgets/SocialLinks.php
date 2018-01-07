<?php

namespace app\modules\core\widgets;

use Yii;
use app\modules\core\models\SocialLink;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SocialLinks extends Widget
{
    /**
     * @var array $options Options for wrapper links
     */
    public $options;

    /**
     * @var array $linkOptions Options for link
     */
    public $linkOptions;

    /**
     * @var bool $isShowLinkText Show text link or no
     */
    public $isShowLinkText = false;

    /**
     * {@inheritdoc}
     *
     * @return mixed
     */
    public function run()
    {
        $socialLinks = SocialLink::find()
            ->where(['active' => 1])
            ->orderBy(['display_order' => SORT_ASC])
            ->all();

        $wrapperTag = ArrayHelper::remove($this->options, 'tag', 'ul');
        $links      = $this->renderSocialLinks($socialLinks);

        return ($wrapperTag) ? Html::tag($wrapperTag, $links, $this->options) : $links;
    }

    /**
     * Generate social links
     *
     * @param \app\modules\core\models\SocialLink[] $socialLinks
     * @return string
     */
    private function renderSocialLinks($socialLinks)
    {
        $links              = [];
        $linkOptions        = $this->linkOptions;
        $linkWrapperOptions = ArrayHelper::remove($linkOptions, 'wrapper', []);
        $linkWrapperTag     = ArrayHelper::remove($linkWrapperOptions, 'tag', 'li');

        foreach ($socialLinks as $link) {
            $currentLinkOptions = $linkOptions;
            Html::addCssClass($currentLinkOptions, $link->link_class);

            $linkText = ($this->isShowLinkText) ? $link->name : '';

            if ($linkWrapperTag) {
                $links[] = Html::tag($linkWrapperTag, Html::a($linkText, $link->href, $currentLinkOptions), $linkWrapperOptions);
            } else {
                $links[] = Html::a($linkText, $link->href, $currentLinkOptions);
            }
        }

        return implode(PHP_EOL, $links);
    }
}
