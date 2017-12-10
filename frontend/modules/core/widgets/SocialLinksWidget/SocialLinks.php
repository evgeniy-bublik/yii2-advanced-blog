<?php

namespace app\modules\core\widgets\SocialLinksWidget;

use Yii;
use app\modules\core\models\SocialLink;
use yii\base\Widget;

class SocialLinks extends Widget
{
    public $template = 'default';

    public function run()
    {
        $socialLinks = SocialLink::find()
            ->where(['active' => 1])
            ->orderBy(['display_order' => SORT_ASC])
            ->all();

        return $this->render($this->template, [
            'socialLinks' => $socialLinks,
        ]);
    }
}