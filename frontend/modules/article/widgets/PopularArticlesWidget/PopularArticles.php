<?php

namespace app\modules\article\widgets\PopularArticlesWidget;

use yii\base\Widget;
use app\modules\article\models\Article;
use yii\db\Expression;

class PopularArticles extends Widget
{
    public $count = 3;

    public function run()
    {
        $articles = Article::find()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', new Expression('NOW()')])
            ->orderBy(['unique_views' => SORT_DESC])
            ->limit($this->count)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
        ]);
    }
}