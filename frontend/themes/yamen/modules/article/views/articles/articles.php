<?php
use yii\widgets\ListView;
use app\modules\article\widgets\ArticleLinkPager;
use yii\helpers\Html;
use app\modules\article\widgets\TagsWidget\Tags;
use app\modules\article\widgets\CategoriesWidget\Categories;
?>

<!-- Start Pages Title Style1 -->
<section id="Page-title" class="Page-title-Style1">
    <div class="container inner-Pages">
        <div class="row">
            <div class="Page-title">
                <div class="col-md-6 Title-Pages">
                    <h2>Blog Right Sidebar</h2>
                </div>
                <div class="col-md-6 Catogry-Pages">
                    <p>You are here :  <a href="#">Home</a>   /   Blog Right Sidebar</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Pages Title Style1 -->
<!-- Start Blog -->
<section id="Latest-News" class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-md-8">
                <div class="Top-News">

                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_item_on_page_articles',
                        'summary' => false,
                        'layout' => '{items}',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'options' => [
                            'tag' => false,
                        ],
                    ]); ?>

                </div>
                <!-- Start Pagination -->
                <div id="Pagination" class="light-wrapper Pagination-Full">
                    <div class="row">
                        <div class="pager col-md-12 text-center">

                            <?= ArticleLinkPager::widget([
                                'pagination' => $dataProvider->pagination,
                                'activePageCssClass' => 'selected',
                                'nextPageCssClass' => '',
                                'prevPageCssClass' => '',
                                'lastPageLabel' => false,
                                'firstPageLabel' => false,
                                'nextPageLabel' => (Yii::$app->request->get($dataProvider->pagination->pageParam) < $dataProvider->pagination->totalCount) ? Html::tag('i', null, ['class' => 'fa fa-long-arrow-right']) : false,
                                'prevPageLabel' => (Yii::$app->request->get($dataProvider->pagination->pageParam) > 1) ? Html::tag('i', null, ['class' => 'fa fa-long-arrow-left']) : false,
                                'options' => [
                                    'class' => '',
                                ],
                            ]); ?>

                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <div class="col-md-4">
                <div class="SideBar-Blog">

                    <?= Categories::widget(); ?>

                    <div class="Line-Bloge"></div>

                    <?= Tags::widget(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog -->