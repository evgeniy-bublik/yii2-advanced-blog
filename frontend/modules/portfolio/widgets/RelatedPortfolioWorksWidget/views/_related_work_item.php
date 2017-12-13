<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;

/* @var app\modules\portfolio\models\Work $work */
/* @var yii\web\View $this */
?>
<div class="col-md-10 col-lg-6">
    <article class="post-minimal">
        <div class="post-left">
            <figure class="post-image"><img src="<?= $work->getPreview([220, 224]); ?>" alt="<?= $work->name; ?>" width="220" height="224"/>
            </figure>
        </div>
        <div class="post-body">
            <h5><a href="<?= Url::toRoute(['/portfolio/works/work', 'workAlias' => $work->alias]); ?>"><?= $work->name; ?></a></h5>
            <div class="post-meta">
                <div class="object-inline-baseline"><span class="novi-icon icon icon-xxs icon-primary fa-calendar-minus-o"></span>
                    <time datetime="2016-03-14"><?= $work->getDate('{monthName} {year}'); ?></time>
                </div>
            </div>
            <p><?= StringHelper::truncate($work->description, 125, '...', 'UTF-8'); ?></p>
        </div>
    </article>
</div>