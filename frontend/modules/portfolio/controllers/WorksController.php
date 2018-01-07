<?php

namespace app\modules\portfolio\controllers;

use app\modules\core\components\FrontController;
use app\modules\portfolio\models\Category as PortfolioCategory;
use app\modules\portfolio\models\Tag as PortfolioTag;
use app\modules\portfolio\models\Work;
use yii\db\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class WorksController extends FrontController
{
    /**
     * Page portfolio works
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $works = Work::find()
            ->where(['active' => 1])
            ->joinWith('linksWorkToCategory')
            ->orderBy(['date' => SORT_DESC])
            ->all();

        $categories = PortfolioCategory::find()
            ->joinWith('linksWorkToCategory')
            ->all();


        return $this->render('index', [
            'categories' => $categories,
            'works' => $works,
        ]);
    }

    /**
     * Page item work
     *
     * @param string $workAlias Alias work uri
     * @return mixed
     */
    public function actionWork($workAlias)
    {
        $portfolioWork = Work::find()
            ->where([
                'active' => 1,
                'alias' => $workAlias
            ])
            ->one();

        if (!$portfolioWork) {
            throw new NotFoundHttpException('Страница не существует или же была удалена');
        }

        $this->setMetaTitle($portfolioWork->meta_title);
        $this->setMetaDescription($portfolioWork->meta_description);
        $this->setMetaKeywords($portfolioWork->meta_keywords);

        return $this->render('item-portfolio', [
            'work' => $portfolioWork,
        ]);
    }

    /**
     * Page works with tag alias
     *
     * @param string $tagAlias Alias tag uri
     * @return mixed
     */
    public function actionTag($tagAlias)
    {
        $tag = PortfolioTag::findOne(['alias' => $tagAlias]);

        if (!$tag) {
            throw new NotFoundHttpException('Страница не существует или же была удалена');
        }

        $categories = PortfolioCategory::find()
            ->joinWith('works.linksWorkToTag as lwtt')
            ->where(['lwtt.tag_id' => $tag->id])
            ->all();

        $works = Work::find()
            ->with('linksWorkToTag')
            ->joinWith('linksWorkToTag as lwtt')
            ->where(['lwtt.tag_id' => $tag->id])
            ->all();

        $this->setMetaTitle($tag->meta_title);
        $this->setMetaDescription($tag->meta_description);
        $this->setMetaKeywords($tag->meta_keywords);

        return $this->render('index', [
            'categories' => $categories,
            'works' => $works,
        ]);
    }
}
