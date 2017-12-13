<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\LinksWorkToTag as BaseLinksWorkToTag;

class LinksWorkToTag extends BaseLinksWorkToTag
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
}
