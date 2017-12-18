<?php
use yii\widgets\Menu;

/* @var yii\web\View $this */
?>

<?= Menu::widget([
    'options' => [
        'class' => 'rd-navbar-nav',
    ],
    'items' => [
        [
            'label' => 'Главная',
            'url' => '/',
        ],
        [
            'label' => 'Портфолио',
            'url' => ['/portfolio/works/index'],
        ],
        [
            'label' => 'Блог',
            'url' => ['/article/articles/articles'],
        ]
    ],
]); ?>