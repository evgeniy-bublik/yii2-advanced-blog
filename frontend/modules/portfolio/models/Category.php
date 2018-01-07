<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Category as BaseCategory;

class Category extends BaseCategory
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToCategory()
    {
        return $this->hasMany(LinksWorkToCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['id' => 'work_id'])
            ->viaTable(LinksWorkToCategory::tableName(), ['category_id' => 'id']);
    }
}
