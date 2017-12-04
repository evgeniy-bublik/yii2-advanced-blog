<?php

namespace app\modules\core\components;

use Yii;
use yii\web\Controller;
use app\modules\core\models\Setting;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

class FrontController extends Controller
{
    public $settings;

    public function init()
    {
        parent::init();

        $this->settings = ArrayHelper::map(Setting::find()->all(), 'key', 'value');
    }

    protected function setMetaTitle($metaTitle)
    {
        Yii::$app->view->title = $metaTitle;
    }

    protected function setMetaDescription($metaDescription)
    {
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => $metaDescription,
        ]);
    }

    protected function setMetaKeywords($metaKeywords)
    {
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => $metaKeywords,
        ]);
    }
}