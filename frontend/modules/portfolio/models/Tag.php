<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Tag as BaseTag;

class Tag extends BaseTag
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['tag_id' => 'id']);
    }
}
