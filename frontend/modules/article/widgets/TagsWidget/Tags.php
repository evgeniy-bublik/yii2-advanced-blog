<?php

namespace app\modules\article\widgets\TagsWidget;

use yii\base\Widget;
use app\modules\article\models\ArticleTag;

class Tags extends Widget
{
    public function run()
    {
        $tags = ArticleTag::find()
            //->where(['active' => 1])
            ->all();

        return $this->render('index', [
            'tags' => $tags,
        ]);
    }
}