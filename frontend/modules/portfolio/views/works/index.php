<?php
/* @var app\modules\portfolio\models\Category[] $categories */
/* @var app\modules\portfolio\models\Work[] $works */
/* @var yii\web\View $this */
?>
<section class="section section-30 section-xxl-40 section-xxl-66 section-xxl-bottom-90 novi-background bg-gray-dark page-title-wrap" style="background-image: url(/images/bg-image-5.jpg);">
    <div class="container">
        <div class="page-title">
            <h2>Портфолио</h2>
        </div>
    </div>
</section>
<section class="section section-50 section-md-90 section-lg-bottom-120 section-xl-bottom-165">
    <div class="container isotope-wrap text-center">
        <div class="row row-40">
            <div class="col-sm-12">
                <ul class="isotope-filters-responsive">
                    <li>
                        <p>Choose your category:</p>
                    </li>
                    <li class="block-top-level">
                        <button class="isotope-filters-toggle button button-sm button-default" data-custom-toggle="#isotope-1" data-custom-toggle-hide-on-blur="true">Фильтр<span class="caret"></span></button>
                        <div class="isotope-filters isotope-filters-minimal isotope-filters-horizontal" id="isotope-1">
                            <ul class="list-inline">
                                <li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="#">Все</a></li>

                                <?php foreach ($categories as $category) : ?>

                                    <li><a data-isotope-filter="Category <?= $category->id; ?>" data-isotope-group="gallery" href="#"><?= $category->name; ?></a></li>

                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="isotope isotope-gutter-default" data-isotope-layout="fitRows" data-isotope-group="gallery" data-photo-swipe-gallery="gallery">

                        <?php foreach ($works as $work) : ?>

                            <?= $this->render('_index_portfolio_work', [
                                'model' => $work,
                            ]); ?>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>