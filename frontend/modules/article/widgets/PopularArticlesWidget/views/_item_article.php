<?php
use yii\helpers\Url;
?>

<article class="post post-preview">
    <a href="<?= Url::toRoute(['/article/articles/article', 'articleAlias' => $article->alias]); ?>">
        <div class="unit unit-spacing-sm">

            <?php if ($preview = $article->getPreview([70, 70])) : ?>

                <div class="unit-left">
                    <figure class="post-image">
                        <img src="<?= $preview; ?>" alt="<?= $article->title; ?>" width="70" height="70"/>
                    </figure>
                </div>

            <?php endif; ?>

            <div class="unit-body">
                <div class="post-header">
                    <p><?= $article->title; ?></p>
                </div>
                <div class="post-meta">
                    <ul class="list-meta">
                        <li>
                            <time datetime="<?= date('Y-m-d'); ?>"><?= $article->getDate(); ?></time>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
</article>