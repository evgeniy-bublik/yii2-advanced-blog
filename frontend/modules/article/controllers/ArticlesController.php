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
use yii\helpers\Url;
use app\modules\core\models\Helper as FrontHelper;

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
            throw new NotFoundHttpException('Страницы не существует или же она была удалена');
        }

        $ip = Yii::$app->request->userIp;

        $article->updateTotalViews();

        if (!$article->hasUniqueView($ip)) {
            $article->setUniqueView($ip);
        }

        $this->setMetaTitle(FrontHelper::replacePlaceholders(
            $article->meta_title,
            [
                '{titleArticle}'  => $article->title,
                '{siteName}'      => ArrayHelper::getValue($this->settings, 'siteName'),
            ]
        ));
        $this->setMetaDescription($article->meta_description);
        $this->setMetaKeywords($article->meta_keywords);

        $this->registerSocialMeta($article);

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
            throw new NotFoundHttpException('Страницы не существует или же она была удалена');
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

        $this->setMetaTitle(FrontHelper::replacePlaceholders(
            $tag->meta_title,
            [
                '{tagName}'   => $tag->name,
                '{siteName}'  => ArrayHelper::getValue($this->settings, 'siteName'),
            ]
        ));
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
          throw new NotFoundHttpException('Страницы не существует или же она была удалена');
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

        $this->setMetaTitle(FrontHelper::replacePlaceholders(
            $category->meta_title,
            [
                '{categoryTitle}' => $category->title,
                '{siteName}'      => ArrayHelper::getValue($this->settings, 'siteName'),
            ]
        ));
        $this->setMetaDescription($category->meta_description);
        $this->setMetaKeywords($category->meta_keywords);

        return $this->render('articles', compact('dataProvider'));
    }

    /**
     * Search articles
     *
     * @return mixed
     */
    public function actionSearch()
    {
        $searchForm = new SearchForm();

        $searchForm->load(Yii::$app->request->get());

        $dataProvider = $searchForm->search();

        return $this->render('search_articles', compact('dataProvider', 'searchForm'));
    }

    /**
     * Register meta tags for share buttons
     *
     * @param app\modules\article\models\Article $article
     * @return void
     */
    private function registerSocialMeta(Article $article)
    {
        $siteName = ArrayHelper::getValue($this->settings, 'siteName', '');

        Yii::$app->view->registerMetaTag([
            'name'    => 'og:url',
            'content' => Url::toRoute(['/article/articles/article', 'articleAlias' => $article->alias], true),
        ]);

        Yii::$app->view->registerMetaTag([
            'name'    => 'og:type',
            'content' => 'website',
        ]);

        Yii::$app->view->registerMetaTag([
            'name'    => 'og:title',
            'content' => FrontHelper::replacePlaceholders($article->meta_title, [
                '{titleArticle}'  => $article->title,
                '{siteName}'      => $siteName,
            ]),
        ]);

        Yii::$app->view->registerMetaTag([
            'name'    => 'og:description',
            'content' => FrontHelper::replacePlaceholders($article->meta_description, [
                '{siteName}' => $siteName,
            ]),
        ]);

        Yii::$app->view->registerMetaTag([
            'name'    => 'twitter:card',
            'content' => 'summary_large_image',
        ]);


        if ($article->image) {
            Yii::$app->view->registerMetaTag([
                'name'    => 'og:image',
                'content' => $article->getFullImage(),
            ]);
        }
    }
}