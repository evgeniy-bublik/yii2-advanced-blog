<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\widgets\Menu;

$this->title = $name;
$this->context->layout = '404';
?>
<!-- Page-->
<div class="page context-dark text-center">
    <!-- Page preloader-->
    <div class="page-loader">
        <div>
            <a class="brand brand-md" href="/"><img src="/images/logo.png" width="139" height="22" alt="logo"/></a>
            <div class="page-loader-body">
                <div id="spinningSquaresG">
                    <div class="spinningSquaresG" id="spinningSquaresG_1"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_2"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_3"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_4"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_5"> </div>
                    <div class="spinningSquaresG" id="spinningSquaresG_6"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_7"></div>
                    <div class="spinningSquaresG" id="spinningSquaresG_8"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-canvas">
        <canvas class="page-canvas-image" style="background: url(/images/404/bg-08.jpg) no-repeat;" id="star-canvas"></canvas>
    </div>
    <div class="page-content">
        <section>
            <div class="shell">
                <div class="range range-center">
                    <div class="cell-md-8 cell-sm-10">
                        <a class="reveal-inline-block brand" href="/"><img src="/images/logo.png" width="166" height="45" alt=""></a>
                        <h2><?= $message; ?></h2>
                        <h1><span class="big">404</span></h1>
                        <div class="group"><a class="button button-primary" href="/">Главная</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>