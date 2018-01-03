<?php
use yii\helpers\Url;
use app\modules\core\widgets\SettingWidget;
use app\modules\core\widgets\SocialLinks;
?>

<section class="section section-40 section-md-top-75 section-md-bottom-60 bg-cod-gray novi-background">
    <div class="container text-center text-md-left">
        <div class="row row-30 align-items-md-center justify-content-lg-center justify-content-xl-start">
            <div class="col-lg-11 col-xl-3"><a class="brand" href="/"><img src="/images/logo.png" width="139" height="22" alt="logo"/></a></div>
            <div class="col-md-7 col-lg-6 col-xl-5">
                <div class="wrap-justify">

                    <?php if ($address = SettingWidget::widget(['key' => 'admin_address'])) : ?>

                        <address class="contact-info text-left">
                            <div class="unit unit-horizontal unit-spacing-xs align-items-center justify-content-center unit-sm-left">
                                <div class="unit-left"><span class="novi-icon icon icon-md-custom icon-gunsmoke material-icons-place"></span></div>
                                <div class="unit-body font-weight-light"><a class="link-light-03 d-inline" href="#"><?= $address; ?></a></div>
                            </div>
                        </address>

                    <?php endif; ?>

                    <address class="contact-info text-left">
                        <div class="unit unit-horizontal unit-spacing-xs align-items-center justify-content-center unit-sm-left">
                            <div class="unit-left"><span class="novi-icon icon icon-md-custom icon-gunsmoke material-icons-phone"></span></div>
                            <div class="unit-body font-weight-light">

                                <?php if ($phone = SettingWidget::widget(['key' => 'admin_phone'])) : ?>

                                    <div class="link-wrap"><a class="link-light-03" href="callto:<?= $phone; ?>"><?= $phone; ?></a></div>

                                <?php endif; ?>
                                <?php if ($email = SettingWidget::widget(['key' => 'admin_email'])) : ?>

                                    <div class="link-wrap"><a class="link-light-03" href="mailto:<?= $email; ?>"><?= $email; ?></a></div>

                                <?php endif; ?>

                            </div>
                        </div>
                    </address>
                </div>
            </div>
            <div class="col-md-5 col-xl-4 text-lg-center">

                <?= SocialLinks::widget([
                    'options' => [
                        'class' => 'list-inline list-inline-xs',
                    ],
                    'linkOptions' => [
                        'class' => 'novi-icon icon icon-sm-custom link-tundora',
                        'target' => '_blank',
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</section>