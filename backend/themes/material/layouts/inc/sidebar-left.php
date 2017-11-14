<?php
use yii\helpers\Url;
?>
<aside id="app_sidebar-left">
    <nav id="app_main-menu-wrapper" class="scrollbar">
        <div class="sidebar-inner sidebar-push">
            <div class="card profile-menu" id="profile-menu">
                <header class="card-heading card-img alt-heading">
                    <div class="profile">
                        <header class="card-heading card-background" id="card_img_02">
                            <img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/18.jpg'); ?>" alt="" class="img-circle max-w-75 mCS_img_loaded">
                        </header>
                        <a href="javascript:void(0)" class="info" data-profile="open-menu"><span><?= Yii::$app->user->identity->email; ?></span></a>
                    </div>
                </header>
                <ul class="submenu">
                    <li>
                        <a href="page-profile.html"><i class="zmdi zmdi-account"></i> Profile</a>
                    </li>
                    <li>
                        <a href="app-mail.html"><i class="zmdi zmdi-email"></i> Messages</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> Account Settings</a>
                    </li>
                    <li>
                        <a href="<?= Url::toRoute(['/user/security/logout']); ?>" data-method="post"><i class="zmdi zmdi-sign-in"></i> Sign Out</a>
                    </li>
                </ul>
            </div>

            <?= $this->render('header-nav'); ?>

        </div>
    </nav>
</aside>