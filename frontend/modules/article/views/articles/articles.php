<?php
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var yii\web\View $this */
/* @var yii\data\ActiveDataProvider $dataProvider Data list of articles*/
$layoutArticles = '{items}';

if ($dataProvider->pagination->getPageCount()) {
    $layoutArticles .= '{pager}';
}
?>
<section class="section section-30 section-xxl-40 section-xxl-66 section-xxl-bottom-90 novi-background bg-gray-dark page-title-wrap" style="background-image: url(/images/bg-blog.jpg);">
    <div class="container">
        <div class="page-title">
            <h2>Blog</h2>
        </div>
    </div>
</section>
<section class="section section-50 section-md-75 section-xl-100">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xl-10">

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_article_on_page_articles',
                    'summary' => false,
                    'options' => [
                        'tag' => false,
                    ],
                    'itemOptions' => [
                        'tag' => false,
                    ],
                    'layout' => '{items}<div class="pagination-custom-wrap text-center">{pager}</div>',
                    'pager' => [
                        'options' => [
                            'class' => 'pagination-custom'
                        ]
                    ]
                ]); ?>
                
            </div>
        </div>
    </div>
</section>