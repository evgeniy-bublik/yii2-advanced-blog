<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\core\components\FrontController;

class ArticlesController extends FrontController
{
    public function actionRightIndex()
    {
        return $this->render('right-index');
    }

    public function actionLeftIndex()
    {
        return $this->render('left-index');
    }

    public function actionArticleSingleCenter()
    {
        return $this->render('article-single-center');
    }

    public function actionArticleSingleLeftSidebar()
    {
        return $this->render('article-single-left-sidebar');
    }

    public function actionArticleSingleRightSidebar()
    {
        return $this->render('article-single-right-sidebar');
    }

    public function actionBlogGridTwo()
    {
        return $this->render('blog-grid-two');
    }

    public function actionBlogGridThird()
    {
        return $this->render('blog-grid-third');
    }

    public function actionBlogGridFour()
    {
        return $this->render('blog-grid-four');
    }
}