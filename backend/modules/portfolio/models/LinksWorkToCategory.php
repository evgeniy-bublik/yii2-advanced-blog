<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\LinksWorkToCategory as BaseLinksWorkToCategory;

class LinksWorkToCategory extends BaseLinksWorkToCategory
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
}
