<?php
use app\modules\article\widgets\RandomArticlesWidget\RandomArticles;
use yii\helpers\Url;
use app\modules\core\widgets\SettingWidget;
?>

<section class="section page-prefoot bg-cod-gray nov-background">
    <div class="section-40 section-md-75">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-sm-9 col-md-11 col-xl-12">
                    <div class="row row-50">
                        <div class="col-md-6 col-lg-10 col-xl-3">
                            <div class="inset-xl-right-20" style="max-width: 510px;">
                                <a class="brand" href="index.html"><img src="/images/logo-white.svg" width="139" height="22" alt="logo"/></a>
                                <p>TemplateMonster is an A-size depot of website templates - more than 46,000 designs to choose from. Since coming up in May 2002, we've gone 25 partners.</p>
                                <a class="link link-group link-group-animated link-bold link-white" href="//www.templatemonster.com/website-templates/starbis.html" target="_blank"><span>Get Starbis Now</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
                            </div>
                        </div>

                        <?= RandomArticles::widget(); ?>

                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <h6 class="page-prefoot-header">Меню</h6>
                            <div class="row" style="max-width: 270px;">
                                <div class="col-6">
                                    <ul class="list-marked-variant-2">
                                        <li><a href="/">Главная</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="careers.html">Careers</a></li>
                                        <li><a href="<?= Url::toRoute(['/article/articles/articles']); ?>">Блог</a></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-marked-variant-2">
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="contact-us.html">Contacts</a></li>
                                        <li><a href="appointment.html">Appointment</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <h6 class="page-prefoot-header">Связь со мною</h6>
                            <address class="contact-info text-left">
                                <ul class="list-sm">

                                    <?php if ($phone = SettingWidget::widget(['key' => 'admin_phone'])) : ?>

                                        <li>
                                            <div class="unit unit-spacing-md align-items-center">
                                                <div class="unit-left"><span class="novi-icon icon icon-xs icon-primary material-icons-phone"></span></div>
                                                <div class="unit-body"><a class="link-white" href="callto:#"><?= $phone; ?></a></div>
                                            </div>
                                        </li>

                                    <?php endif; ?>
                                    <?php if ($email = SettingWidget::widget(['key' => 'admin_email'])) : ?>

                                        <li>
                                            <div class="unit unit-spacing-md align-items-center">
                                                <div class="unit-left"><span class="novi-icon icon icon-xs icon-primary fa fa-envelope-o"></span></div>
                                                <div class="unit-body"><a class="link-white" href="mailto:#"><?= $email; ?></a></div>
                                            </div>
                                        </li>

                                    <?php endif; ?>
                                    <?php if ($address = SettingWidget::widget(['key' => 'admin_address'])) : ?>

                                        <li>
                                            <div class="unit unit-spacing-md">
                                                <div class="unit-left"><span class="novi-icon icon icon-xs icon-primary material-icons-place"></span></div>
                                                <div class="unit-body"><a class="link-white d-inline" href="#"><?= $address; ?></a></div>
                                            </div>
                                        </li>

                                    <?php endif; ?>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
</section>