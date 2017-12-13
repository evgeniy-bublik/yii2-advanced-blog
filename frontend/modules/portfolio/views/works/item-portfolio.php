<?php
    use app\modules\portfolio\widgets\RelatedPortfolioWorksWidget\RelatedPortfolioWorks;
?>
<section class="section section-30 section-xxl-40 section-xxl-66 section-xxl-bottom-90 novi-background bg-gray-dark page-title-wrap" style="background-image: url(/images/bg-gallery.jpg);">
    <div class="container">
        <div class="page-title">
            <h2>Портфолио</h2>
        </div>
    </div>
</section>
<section class="section section-60 section-md-75 section-xl-90">
    <div class="container">
        <h3><?= $work->name; ?></h3>
        <article class="post-info">
            <div class="post-image"><img src="<?= $work->getFullImage(); ?>" alt="<?= $work->name; ?>">
            </div>
            <div class="post-main">
                <div class="post-left">
                    <ul class="post-meta">
                        <li>
                            <time datetime="2016-05-01"><?= $work->getDate('{monthName} {year}'); ?></time>
                        </li>
                        <li>Евгений Бублик</li>
                        <li>
                            <ul class="list-hashtags">

                                <?= $work->getListWorkTags('<li>{linkTag}</li>'); ?>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="post-body">
                    <?= $work->description; ?>
                </div>
            </div>
        </article>
    </div>
</section>

<?= RelatedPortfolioWorks::widget([
    'tags' => $work->tags,
    'workId' => $work->id,
]); ?>