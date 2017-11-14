<?php
use yii\helpers\Url;
use app\modules\core\widgets\Menu;
?>

<?= Menu::widget([
    'options' => [
        'class' => 'nav nav-pills nav-stacked',
    ],
    'submenuTemplate' => '<ul class="nav-sub">{items}</ul>',
    'linkTemplate' => '<a href="{url}">{icon}{label}</a>',
    'items' => [
        [
            'label' => 'NAVIGATION',
            'options' => [
                'class' => 'sidebar-header',
            ],
        ],
        [
            'label' => 'Dashboard',
            'url' => Url::toRoute(['/core/index/index']),
            'icon' => [
                'class' => 'zmdi zmdi-view-dashboard',
            ],
        ],
        [
            'label' => 'Settings',
            'url' => Url::toRoute(['/core/settings/update']),
            'icon' => [
                'class' => 'zmdi zmdi-settings',
            ],
        ],
        [
            'label' => 'Articles management',
            'options' => [
                'class' => 'nav-dropdown',
            ],
            'icon' => [
                'class' => 'zmdi zmdi-apps',
            ],
            'url' => '#',
            'items' => [
                [
                    'label' => 'Categories',
                    'url' => Url::toRoute(['/article/article-categories/index']),
                ],
                [
                    'label' => 'Tags',
                    'url' => Url::toRoute(['/article/article-tags/index']),
                ],
                [
                    'label' => 'Articles',
                    'url' => Url::toRoute(['/article/articles/index']),
                ]
            ],
        ],
        [
            'label' => 'Social links',
            'url' => Url::toRoute(['/core/social-links/index']),
            'icon' => [
                'class' => 'zmdi zmdi-share',
            ],
        ]
    ]
]); ?>

