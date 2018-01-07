<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\components\FrontController;
use app\modules\core\models\SitemapGenerator;
use yii\web\Response;

class IndexController extends FrontController
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Display sitemap
     *
     * @return mixed
     */
    public function actionSitemap()
    {
        $urls = SitemapGenerator::generate();

        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');

        return $this->renderPartial('sitemap', compact('urls'));
    }

    /**
     * Display page for all requests.
     *
     * @return mixed
     */
    public function actionCatchAll()
    {
        $this->layout = '//stub';
        $this->view->title = 'Скоро мы откроемя))';

        return $this->render('catch-all');
    }
}
