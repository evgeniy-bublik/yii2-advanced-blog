<?php

namespace app\modules\article\widgets\RandomArticlesWidget;

use yii\base\Widget;
use app\modules\article\models\Article;
use yii\db\Expression;

class RandomArticles extends Widget
{
    public $count = 2;
    public $view = 'default';

    public function run()
    {
        $articles = Article::find()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', new Expression('NOW()')])
            ->orderBy(new Expression('RAND()'))
            ->limit($this->count)
            ->all();

        return $this->render($this->view, [
            'articles' => $articles,
        ]);
    }
}