<?php
use yii\helpers\Url;
/* @var app\modules\article\models\ArticleTag[] $tags Array list tags*/
?>
<?php if ($tags) : ?>

    <div class="blog-aside-item">
        <h6>Теги</h6>
        <ul class="list-tag-blocks">

            <?php foreach ($tags as $tag) : ?>

                <li><a href="<?= Url::toRoute(['/article/articles/tag', 'tagAlias' => $tag->alias]); ?>"><?= $tag->name; ?></a></li>

            <?php endforeach; ?>

        </ul>
    </div>

<?php endif; ?>