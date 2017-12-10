<?php
use yii\helpers\Url;
?>
<?php if ($categories) : ?>

    <div class="blog-aside-item">
        <h6>Категории</h6>
        <ul class="list-marked-bordered">

            <?php foreach ($categories as $category) : ?>

                <li><a href="<?= Url::toRoute(['/article/articles/category', 'categoryAlias' => $category->alias]); ?>"><span><?= $category->title; ?></span><span class="list-counter">(<?= $category->getCountArticles(); ?>)</span></a></li>

            <?php endforeach; ?>
            
        </ul>
    </div>

<?php endif; ?>