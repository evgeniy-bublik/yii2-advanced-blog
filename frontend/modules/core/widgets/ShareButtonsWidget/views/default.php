<?php
use yii\helpers\Html;

/** @var string $wrapperTag Tag name for wrapper share links */
/** @var array $wrapperOptions Options for tag wrapper share links */
/** @var \yii\web\View $this */
?>
<div class="post-footer">
    <h5>Поделиться:</h5>

    <?php if ($wrapperTag) : ?>

        <?= Html::beginTag($wrapperTag, $wrapperOptions); ?>

    <?php endif; ?>

        <?php foreach ($links as $link) : ?>

          <?= $link; ?>

        <?php endforeach ; ?>

        <!--<li><a class="novi-icon icon icon-xxs-small link-tundora fa-facebook" href="#"></a></li>
        <li><a class="novi-icon icon icon-xxs-small link-tundora fa-twitter" href="#"></a></li>
        <li><a class="novi-icon icon icon-xxs-small link-tundora fa-google-plus" href="#"></a></li>
        <li><a class="novi-icon icon icon-xxs-small link-tundora fa-pinterest-p" href="#"></a></li>-->

    <?php if ($wrapperTag) : ?>

      <?= Html::endTag($wrapperTag); ?>

    <?php endif; ?>

</div>