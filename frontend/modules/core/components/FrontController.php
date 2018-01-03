<?php

namespace app\modules\core\components;

use Yii;
use yii\web\Controller;
use app\modules\core\models\Setting;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use app\modules\core\models\CorePage;
use yii\web\NotFoundHttpException;
use app\modules\core\models\Helper as FrontHelper;

class FrontController extends Controller
{
    public $settings;

    public function init()
    {
        parent::init();

        $this->settings = ArrayHelper::map(Setting::find()->all(), 'key', 'value');
        $this->settings[ 'siteName' ] = 'DevLife';

        $this->setCorePageMeta();
    }

    protected function setMetaTitle($metaTitle, $placeholders = [])
    {
        Yii::$app->view->title = FrontHelper::replacePlaceholders($metaTitle, $placeholders);
    }

    protected function setMetaDescription($metaDescription, $placeholders = [])
    {
        Yii::$app->view->registerMetaTag([
            'name'    => 'description',
            'content' => FrontHelper::replacePlaceholders($metaDescription, $placeholders),
        ]);
    }

    protected function setMetaKeywords($metaKeywords, $placeholders = [])
    {
        Yii::$app->view->registerMetaTag([
            'name'    => 'keywords',
            'content' => FrontHelper::replacePlaceholders($metaKeywords, $placeholders),
        ]);
    }

    private function setCorePageMeta()
    {
        $route = Yii::$app->request->resolve()[0];
        $page = CorePage::findOne(['route' => $route]);

        if (!$page) {
            return;
        }

        if (!$page->active) {
            throw new NotFoundHttpException('Данная страница не существует или не была перемещена');
        }

        $siteName = ArrayHelper::getValue($this->settings, 'siteName', '');

        $this->setMetaTitle($page->meta_title, [
            '{siteName}' => $siteName,
        ]);

        $this->setMetaDescription($page->meta_description, [
            '{siteName}' => $siteName,
        ]);

        $this->setMetaKeywords($page->meta_keywords, [
            '{siteName}' => $siteName,
        ]);
    }
}