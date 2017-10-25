<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\core\models\SocialLink */

$this->title = 'Update Social Link: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Social Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="social-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
