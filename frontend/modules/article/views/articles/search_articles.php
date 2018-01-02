<?php
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var yii\web\View $this */
/* @var yii\data\ActiveDataProvider $dataProvider Data list of articles*/
?>

<section class="section section-30 section-xxl-40 section-xxl-66 section-xxl-bottom-90 novi-background bg-gray-dark page-title-wrap" style="background-image: url(/images/bg-search.jpg);">
    <div class="container">
        <div class="page-title">
            <h2>Результаты поиска</h2>
        </div>
    </div>
</section>
<section class="section section-60 section-md-90 section-xl-bottom-120 section-only-child">
    <div class="container">
        <div class="row row-40 row-md-60 justify-content-lg-center">
            <div class="col-lg-10">

                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'rd-search rd-search-minimal',
                    ],
                    'action' => ['/article/articles/search'],
                    'method' => 'GET',
                    'fieldConfig' => [
                        'options' => [
                            'class' => 'form-wrap',
                        ],
                        'inputOptions' => [
                            'autocomplete' => 'off',
                            'class' => 'form-input',
                        ],
                        'labelOptions' => [
                            'class' => 'form-label',
                        ],
                    ],
                ]); ?>

                    <?= $form->field($searchForm, 'search')->label(false); ?>

                    <!-- <div class="form-wrap">
                        <label class="form-label" for="rd-search-form-input-1"><span class="text-mobile">search...</span><span class="text-default">start type and hit enter</span></label>
                        <input class="form-input" id="rd-search-form-input-1" type="text" name="s" autocomplete="off">
                    </div>-->
                    <button class="button-icon-only button-icon-only-primary" type="submit"><span class="novi-icon icon icon-sm material-icons-keyboard_return"></span></button>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-md-11">
                <div class="rd-search-results">

                    <?php if ($dataProvider) : ?>

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

                  <?php else : ?>

                      <p>Ничего не найдено.</p>

                  <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>