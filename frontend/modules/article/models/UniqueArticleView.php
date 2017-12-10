<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\UniqueArticleView as BaseUniqueArticleView;


class UniqueArticleView extends BaseUniqueArticleView
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
}