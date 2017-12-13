<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\user\models\ProffessionalSkill[] $skills Array skills */
?>
<ul class="list-progress">

    <?php foreach ($skills as $skill) : ?>

        <li>
            <p class="animated fadeIn"><?= $skill->name; ?></p>

            <?= Html::tag(
                'div',
                null,
                [
                    'class' => 'progress-bar-js progress-bar-horizontal',
                    'data-value' => $skill->value,
                    'style' => 'stroke: ' . $skill->color_bar . '!important',
                    'data-stroke' => 4,
                    'data-easing' => 'linear',
                    'data-counter' => 'true',
                    'data-duration' => 1000,
                    'data-trail' => 100,
                ]
            ); ?>

        </li>

    <?php endforeach; ?>

</ul>