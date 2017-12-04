<?php

namespace app\modules\article\widgets\CategoriesWidget;

use yii\base\Widget;
use app\modules\article\models\ArticleCategory;

class Categories extends Widget
{
    public function run()
    {
        $categories = ArticleCategory::find()
            //->where(['active' => 1])
            ->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }
}