<?php
use yii\helpers\Url;

/* @var app\modules\portfolio\models\Work $model */
/* @var yii\web\View $this */
?>
<div class="col-12 col-md-6 col-lg-4 isotope-item" data-filter="<?= ($category = $model->getCategory()) ? 'Category ' . $category->id : ''; ?>">
    <div class="thumbnail thumbnail-variant-3">
        <a class="link link-external" href="<?= Url::toRoute(['/portfolio/works/work', 'workAlias' => $model->alias]); ?>"><span class="novi-icon icon icon-sm fa fa-link"></span></a>
        <figure><img src="<?= $model->getPreview([370,278]); ?>" alt="" width="370" height="278"/>
        </figure>
        <div class="caption"><a class="link link-original" href="<?= $model->getFullImage(); ?>" data-photo-swipe-item="" data-size="1200x900"></a></div>
    </div>
</div>