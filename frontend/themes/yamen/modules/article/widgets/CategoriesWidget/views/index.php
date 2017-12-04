<?php
use yii\helpers\Url;
?>
<div class="Categories-Blog">
    <div class="Top-Title-Page">
        <h3>Категории</h3>
        <div class="line-break"></div>
    </div>
    <div class="Categories-Block">
        <ul>

            <?php foreach ($categories as $category) : ?>

                <li>
                    <a href="<?= Url::toRoute(['/article/articles/category', 'categoryAlias' => $category->alias]); ?>">
                        <p><?= $category->title; ?></p>
                    </a>
                    <span>(<?= $category->getLinksArticleCategories()->count(); ?>)</span><i class="fa fa-angle-double-right"></i>
                </li>

            <?php endforeach; ?>

        </ul>
    </div>
</div>