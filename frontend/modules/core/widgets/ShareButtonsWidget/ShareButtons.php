<?php

namespace app\modules\core\widgets\ShareButtonsWidget;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Widget which show share buttons for socials
 */
class ShareButtons extends Widget
{
    /**
     * @var string Name vk share button
     */
    const BUTTON_VK = 'vk';

    /**
     * @var string Name facebook share button
     */
    const BUTTON_FACEBOOK = 'facebook';

    /**
     * @var string Name twitter share button
     */
    const BUTTON_TWITTER = 'twitter';

    /**
     * @var array $wrapperOptions Html options for wrapper share buttons
     */
    public $wrapperOptions;

    /**
     * @var string $template Template for list share buttons
     */
    public $template = 'default';

    /**
     * @var string $link Link which be share
     */
    public $link;

    /**
     * @var string $linkTemplate Link templte
     */
    public $linkTemplate = '<li>{link}</li>';

    /**
     * @var array $linkOptions Link options for each share button
     */
    public $linkOptions;

    /**
     * @var array $registerShareButtons Names share button which be render
     */
    public $registerShareButtons = [
        self::BUTTON_VK,
        self::BUTTON_FACEBOOK,
        self::BUTTON_TWITTER,
    ];

    /**
     * @var array $allowedShareButtons Name share buttons which allowed render
     */
    private $allowedShareButtons = [
        self::BUTTON_VK,
        self::BUTTON_FACEBOOK,
        self::BUTTON_TWITTER,
    ];

    /**
     * {@inheritdoc}
     *
     * @return mixed
     */
    public function run()
    {
        $wrapperOptions = $this->wrapperOptions;
        $wrapperTag     = ArrayHelper::remove($wrapperOptions, 'tag', 'ul');
        $links          = $this->generateShareLinks();

        return $this->render($this->template, compact('links', 'wrapperTag', 'wrapperOptions'));
    }

    /**
     * Generate share buttons
     *
     * @return array
     */
    private function generateShareLinks()
    {
        $links = [];

        foreach ($this->registerShareButtons as $button) {
            if (in_array($button, $this->allowedShareButtons)) {
                $links[] = $this->renderShareButton($button);
            }
        }

        return $links;
    }

    /**
     * Render share buttons
     *
     * @param string $button Name button
     * @return string
     */
    private function renderShareButton($button)
    {
        switch ($button) {
            case self::BUTTON_VK:
                return $this->renderVkButton();
            case self::BUTTON_FACEBOOK:
                return $this->renderFacebookButton();
            case self::BUTTON_TWITTER:
                return $this->renderTwitterButton();
        }
    }

    /**
     * Render share link for vk
     *
     * @return string
     */
    private function renderVkButton()
    {
        $view                     = $this->view;
        $linkOptions              = $this->linkOptions;
        $linkOptions[ 'id' ]      = 'vk-share-button';
        $linkOptions[ 'onclick' ] = 'document.getElementById("vkBlock").firstChild.click()';

        \app\modules\core\widgets\ShareButtonsWidget\VkAsset::register($view);

        $view->registerJs('var vkBlock = document.createElement("div"); vkBlock.innerHTML = VK.Share.button("' . $this->link . '", {type: "custom"}); vkBlock.setAttribute("id", "vkBlock"); document.getElementsByTagName("body")[0].appendChild(vkBlock);');
        $view->registerCss('#vkBlock { display: none;}');

        Html::addCssClass($linkOptions, 'fa-vk');

        return strtr($this->linkTemplate, [
            '{link}' => Html::a('', 'javascript:void(0);', $linkOptions),
        ]);
    }

    /**
     * Render share link for facebook
     *
     * @return string
     */
    private function renderFacebookButton()
    {
        $view             = $this->view;
        $fbUiShareParams  = [
            'method'        => 'share',
            'mobile_iframe' => true,
            'href'          => $this->link,
        ];

        \app\modules\core\widgets\ShareButtonsWidget\FacebookAsset::register($view);

        $view->registerJs('document.getElementById("fb-share-button").onclick = function(){FB.ui(' . json_encode($fbUiShareParams) . ', function(response){});}');

        $linkOptions          = $this->linkOptions;
        $linkOptions[ 'id' ]  = 'fb-share-button';

        Html::addCssClass($linkOptions, 'fa-facebook');

        return strtr($this->linkTemplate, [
            '{link}' => Html::a('', 'javascript:void(0);', $linkOptions),
        ]);
    }

    /**
     * Render share link for twitter
     *
     * @return string
     */
    private function renderTwitterButton()
    {
        $view = $this->view;

        \app\modules\core\widgets\ShareButtonsWidget\TwitterAsset::register($view);

        $linkOptions = $this->linkOptions;

        Html::addCssClass($linkOptions, 'fa-twitter');

        return strtr($this->linkTemplate, [
            '{link}' => Html::a(
                  '',
                  'https://twitter.com/intent/tweet?' . http_build_query([
                      'url'   => $this->link,
                      'text'  => $view->title,
                  ]),
                  $linkOptions
            ),
        ]);
    }
}
