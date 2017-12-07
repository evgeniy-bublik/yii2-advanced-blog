<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\core\widgets\SettingWidget;
?>

<!-- Start Footer -->
<section id="footer-4">
    <div class="container inner-f">
        <div class="row">
            <div class="Footer-Blocks">
                <!-- Start About with logo Footer -->
                <div class="col-md-4">
                    <div class="Logo-About">
                        <a class="Footer-logo" href="index.html"></a>
                    </div>
                    <div class="Bottom-Block-Footer">
                        <div class="About">
                            <p>Suspendisse non augue tincidunt, ullaorper odio vel, tempor risus. In cursus lacus mattis consectetur.</p>
                        </div>
                    </div>
                </div>
                <!-- End About with logo Footer -->
                <!-- Start Last Post Footer -->
                <div class="col-md-4">
                    <div class="Top-Block-Footer">
                        <h2>Контактные данные</h2>
                    </div>
                    <div class="divcod20"></div>
                    <div class="Contact-Footer">
                        <ul>

                            <?php if ($adminAddress = SettingWidget::widget(['key' => 'admin_address'])) : ?>

                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <p><?= $adminAddress; ?></p>
                                </li>

                            <?php endif; ?>
                            <?php if ($adminPhone = SettingWidget::widget(['key' => 'admin_phone'])) : ?>

                                <li>
                                    <i class="fa fa-phone"></i>
                                    <p><?= $adminPhone; ?></p>
                                </li>

                            <?php endif; ?>
                            <?php if ($adminEmail = SettingWidget::widget(['key' => 'admin_email'])) : ?>

                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <p><?= $adminEmail; ?></p>
                                </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <!-- End Last Post Footer -->
                <!-- Start Follow Footer -->
                <div class="col-md-4">
                    <div class="Top-Block-Footer">
                        <h2>Follow us!</h2>
                    </div>
                    <div class="divcod20"></div>
                    <div class="Bottom-Block-Footer">
                        <div class="Join-Footer">
                            <div id="mc_embed_signup">
                                <form action="//fobles.us10.list-manage.com/subscribe/post?u=0733acea8768d8355b073fa38&amp;id=726e299dd0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <input type="email" value="" placeholder="Type Email To Join Our Newsletter" name="EMAIL" class="txt-box required email" id="mce-EMAIL">
                                    <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe" class="button btn btnjoin">
                                </form>
                            </div>
                        </div>
                        <div class="Social-join">
                            <div class="Social-Footer">
                                <ul class="icons-ul">
                                    <li class="facebook"><a href="#"><span class="fa fa-facebook hvr-icon-up"></span></a></li>
                                    <li class="twitter"><a href="#"><span class="fa fa-twitter hvr-icon-up"></span></a></li>
                                    <li class="google"><a href="#"><span class="fa fa-google-plus hvr-icon-up"></span></a></li>
                                    <li class="vimeo"><a href="#"><span class="fa fa-vimeo-square hvr-icon-up"></span></a></li>
                                    <li class="linkedin"><a href="#"><span class="fa fa-linkedin hvr-icon-up"></span></a></li>
                                    <li class="dribbble"><a href="#"><span class="fa fa-dribbble hvr-icon-up"></span></a></li>
                                    <li class="youtube"><a href="#"><span class="fa fa-youtube-play hvr-icon-up"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Follow Footer -->
            </div>
        </div>
    </div>
</section>
<section id="Bottom-Footer">
    <div class="container inner-f">
        <div class="row">
            <div class="col-md-6">
                <div class="Rights-Reserved">
                    <h2>All Rights Reserved © <?= date('Y'); ?>. <a href="#"><span>Privacy</span></a> / <a href="#"><span>TOS</span></a> / <a href="#"><span>FAQ</span></a></h2>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="Link-Footer">
                    <ul>
                        <li><a href="<?= Url::toRoute(['/core/index/index']); ?>">Главная</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="<?= Url::toRoute(['/core/index/about']); ?>">О себе</a></li>
                        <li><a href="<?= Url::toRoute(['/article/articles/article']); ?>">Публикации</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer -->