<?php

namespace app\modules\core\components;

use Yii;
use yii\web\Controller;
use app\modules\core\models\Setting;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use app\modules\core\models\CorePage;
use yii\web\NotFoundHttpException;

class FrontController extends Controller
{
    public $settings;

    public function init()
    {
        parent::init();

        $this->settings = ArrayHelper::map(Setting::find()->all(), 'key', 'value');

        $this->setCorePageMeta();
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

        $this->setMetaTitle($page->meta_title);
        $this->setMetaDescription($page->meta_description);
        $this->setMetaKeywords($page->meta_keywords);
    }
}