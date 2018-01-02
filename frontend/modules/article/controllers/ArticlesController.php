<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\core\components\FrontController;
use yii\data\ActiveDataProvider;
use app\modules\article\models\Article;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use app\modules\article\models\ArticleTag;
use app\modules\article\models\ArticleCategory;
use app\modules\article\models\forms\SearchForm;

class ArticlesController extends FrontController
{
    /**
     * List articles
     *
     * @return mixed
     */
    public function actionArticles()
    {
        $dataProviderArticlesConfig = [
            'query' => Article::find()
                ->where(['active' => 1])
                ->andWhere(['<=', 'date', new Expression('NOW()')])
                ->with('tags'),
            'pagination' => [
                'pageSize' => ArrayHelper::getValue($this->settings, 'posts_on_page'),
            ],
        ];

        $dataProvider = new ActiveDataProvider($dataProviderArticlesConfig);

        return $this->render('articles', compact('dataProvider'));
    }

    /**
     * Find article by user-friendly url
     *
     * @param string $articleAlias user-friendly url to article
     * @return mixed
     */
    public function actionArticle($articleAlias)
    {
        $article = Article::find()
            ->where(['active' => 1, 'alias' => $articleAlias])
            ->andWhere(['<=', 'date', new Expression('NOW()')])
            ->with('tags')
            ->one();

        if (!$article) {
            throw new NotFoundHttpException('Article not found');
        }

        $ip = Yii::$app->request->userIp;

        $article->updateTotalViews();

        if (!$article->hasUniqueView($ip)) {
            $article->setUniqueView($ip);
        }

        $this->setMetaTitle($article->meta_title);
        $this->setMetaDescription($article->meta_description);
        $this->setMetaKeywords($article->meta_keywords);

        return $this->render('article', compact('article'));
    }

    /**
     * Find articles by tag
     *
     * @param string $tagAlias user-friendly url to tag
     * @return mixed
     */
    public function actionTag($tagAlias)
    {
        $tag = ArticleTag::find()
            ->where(['alias' => $tagAlias])
            ->one();

        if (!$tag) {
            throw new NotFoundHttpException('Tag not found');
        }

        $dataProviderArticlesConfig = [
            'query' => Article::find()
                ->alias('t')
                ->with('tags')
                ->joinWith('tags as tag')
                ->where(['t.active' => 1, 'tag.alias' => $tagAlias])
                ->andWhere(['<=', 'date', new Expression('NOW()')]),
            'pagination' => [
                'pageSize' => ArrayHelper::getValue($this->settings, 'posts_on_page'),
            ],
        ];

        $dataProvider = new ActiveDataProvider($dataProviderArticlesConfig);

        $this->setMetaTitle($tag->meta_title);
        $this->setMetaDescription($tag->meta_description);
        $this->setMetaKeywords($tag->meta_keywords);

        return $this->render('articles', compact('dataProvider'));
    }

    /**
     * Find articles by category
     *
     * @param string $categoryAlias user-friendly url to category
     * @return mixed
     */
    public function actionCategory($categoryAlias)
    {
        $category = ArticleCategory::find()
            ->where(['active' => 1, 'alias' => $categoryAlias])
            ->one();

        if (!$category) {
          throw new NotFoundHttpException('Category not found');
        }

        $dataProviderArticlesConfig = [
            'query' => Article::find()
                ->alias('t')
                ->with('categories')
                ->joinWith('categories as category')
                ->where(['t.active' => 1, 'category.alias' => $categoryAlias])
                ->andWhere(['<=', 'date', new Expression('NOW()')]),
            'pagination' => [
                'pageSize' => ArrayHelper::getValue($this->settings, 'posts_on_page'),
            ],
        ];

        $dataProvider = new ActiveDataProvider($dataProviderArticlesConfig);

        $this->setMetaTitle($category->meta_title);
        $this->setMetaDescription($category->meta_description);
        $this->setMetaKeywords($category->meta_keywords);

        return $this->render('articles', compact('dataProvider'));
    }

    public function actionSearch()
    {
        $searchForm = new SearchForm();

        $searchForm->load(Yii::$app->request->get());

        $dataProvider = $searchForm->search();

        return $this->render('search_articles', compact('dataProvider', 'searchForm'));
    }
}