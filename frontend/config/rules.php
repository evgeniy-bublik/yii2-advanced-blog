<?php
return [
    '' => '/core/index/index',
    '/about' => '/core/index/about',
    '/articles' => '/article/articles/articles',
    '/article/<articleAlias:\[w-]+>' => '/article/articles/article',
    '/articles/tag/<tagAlias:\[w-]+>' => '/article/articles/tag',
    '/articles/category/<categoryAlias:\w+>' => '/article/articles/category',
    '/portfolio' => '/portfolio/works/index',
    '/portfolio/<workAlias:[\w-]+>' => '/portfolio/works/work',
    '/portfolio/tag/<tagAlias:[\w-]+>' => '/portfolio/works/tag',
];
?>