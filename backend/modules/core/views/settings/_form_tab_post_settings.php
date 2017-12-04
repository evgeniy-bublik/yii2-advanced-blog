<?php
    use app\modules\core\models\Setting;
?>

<?= $form->field($model, 'posts_on_page')->textInput(); ?>

<?= $form->field($model, 'order_posts')->dropDownList(Setting::getListPostOrders()); ?>