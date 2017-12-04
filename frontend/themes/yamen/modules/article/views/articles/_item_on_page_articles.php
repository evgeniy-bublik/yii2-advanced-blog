<?php
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>

<div class="block-News text-center col-md-12">
    <div class="Top-img-news">
        <img src="<?= ($model->image && $preview = $model->getPreview([700, 300])) ? $preview : $model->getNoImage(); ?>" alt="<?= $model->title; ?>" width="293" height="205">
        <div class="data-news text-left">
            <img src="<?= $this->theme->getUrl('/images/blog/Img-User.png'); ?>" alt="blog-user" width="30" height="30">
            <p>Автор:<a href="<?= Url::toRoute(['/core/index/about']); ?>"> Evgeniy Bublik</a> | Дата: <?= $model->getDate(); ?>

            <?php if ($model->categories) : ?>

                | Категории: <?= implode(', ', ArrayHelper::map($model->categories, 'id', function($category) { return Html::a($category->title, Url::toRoute(['/article/articles/category', 'categoryAlias' => $category->alias])); })); ?>

            <?php endif; ?>

            <?php if ($model->tags) : ?>

                | Теги: <?= implode(', ', ArrayHelper::map($model->tags, 'id', function($tag) { return Html::a($tag->name, Url::toRoute(['/article/articles/tag', 'tagAlias' => $tag->alias])); })); ?>

            <?php endif; ?>

            </p>
        </div>
    </div>
    <div class="Bottom-title-news wide-blog">
        <div class="title-news text-left">
            <a href="<?= Url::toRoute(['/article/articles/article', 'articleAlias' => $model->alias]); ?>">
                <h2><?= $model->title; ?></h2>
            </a>
            <p><?= $model->small_description; ?></p>
        </div>
        <div class="Get-news text-left">
            <a href="<?= Url::toRoute(['/article/articles/article', 'articleAlias' => $model->alias]); ?>">Читать далее</a>
        </div>
    </div>
</div>