<?php
use yii\helpers\Url;
?>

<div class="Tags-Blog">
    <div class="Top-Title-Page">
        <h3>Теги</h3>
        <div class="line-break"></div>
    </div>
    <div class="tags">
        <ul>
            <?php foreach ($tags as $tag) : ?>

                <li><a href="<?= Url::toRoute(['/article/articles/tag', 'tagAlias' => $tag->alias]); ?>"><?= $tag->name; ?></a></li>

            <?php endforeach; ?>

        </ul>
    </div>
</div>