<?php

namespace app\modules\portfolio\widgets\RelatedPortfolioWorksWidget;

use yii\base\Widget;
use app\modules\portfolio\models\Work;
use yii\helpers\ArrayHelper;

class RelatedPortfolioWorks extends Widget
{
    public $tags;

    public $workId;

    public $count = 4;

    public function run()
    {
        $tagsIds = ArrayHelper::map($this->tags, 'id', 'id');

        $relatedWorks = Work::find()
            ->alias('t')
            ->where(['active' => 1])
            ->andWhere(['<>', 't.id', $this->workId])
            ->joinWith('linksWorkToTag lwtt')
            ->andWhere(['lwtt.tag_id' => $tagsIds])
            ->limit($this->count)
            ->all();

        return $this->render('related-portfolio-works', [
            'relatedWorks' => $relatedWorks,
        ]);
    }
}