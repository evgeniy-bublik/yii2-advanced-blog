<?php
return [
    '' => '/core/index/index',
    '/about' => '/core/index/about',
    '/search' => '/article/articles/search',
    '/articles' => '/article/articles/articles',
    '/article/<articleAlias:.*>' => '/article/articles/article',
    '/articles/tag/<tagAlias:.*>' => '/article/articles/tag',
    '/articles/category/<categoryAlias:.*>' => '/article/articles/category',
    '/portfolio' => '/portfolio/works/index',
    '/portfolio/<workAlias:[\w-]+>' => '/portfolio/works/work',
    '/portfolio/tag/<tagAlias:[\w-]+>' => '/portfolio/works/tag',
];
?>