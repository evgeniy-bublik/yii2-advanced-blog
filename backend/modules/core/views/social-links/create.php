<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\core\models\SocialLink */

$this->title = 'Create Social Link';
$this->params['breadcrumbs'][] = ['label' => 'Social Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
