<div id="content" class="container-fluid">
    <div class="content-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card app_accent_bg">
                    <div class="card-body p-b-0">
                        <div class="text-left">
                            <h3 class="m-0 text-white">PAGE VIEWS</h3>
                            <span class="text-white block m-b-20">12,322,158</span>
                            <div id="sparkline1" class="m-t-20"></div>
                        </div>
                    </div>
                    <div class="card-footer p-5">
                        <ul class="card-actions left-bottom">
                            <li>
                                <a href="javascript:void(0)" class="btn btn-default btn-flat text-white">
                                View Details
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card app_primary_bg">
                    <div class="card-body p-b-0">
                        <h3 class="m-0 text-white">DONATIONS</h3>
                        <span class="text-white block m-b-20">$8,320</span>
                        <span id="sparkline2" class="m-t-20"></span>
                    </div>
                    <div class="card-footer p-5">
                        <ul class="card-actions left-bottom">
                            <li>
                                <a href="javascript:void(0)" class="btn btn-default btn-flat text-white">
                                View Details
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-400">
                    <header class="card-heading p-b-0">
                        <h2 class="card-title">Developer Work Week</h2>
                        <small>Median hours/week</small>
                        <ul class="card-actions icons right-top">
                            <li>
                                <a href="javascript:void(0)" data-toggle="refresh">
                                <i class="zmdi zmdi-refresh-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                    <li>
                                        <a href="javascript:void(0)">Option One</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Two</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body p-t-0">
                        <div class="chart">
                            <div id="dashboardC3Donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-400">
                    <header class="card-heading">
                        <h2 class="card-title">Earnings 3.5% </h2>
                        <small>Last updated 2 hours ago <span class="text-green">0.05% <i class="zmdi zmdi-trending-up"></i></span></small>
                        <ul class="card-actions icons right-top">
                            <li>
                                <a href="javascript:void(0)" data-toggle="refresh">
                                <i class="zmdi zmdi-refresh-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                    <li>
                                        <a href="javascript:void(0)">Option One</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Two</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body p-0">
                        <div class="ct-chart ct-golden-section" id="chartist_biPolar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="card image-over-card m-t-20">
                    <div class="card-image">
                        <a href="javascript:void(0)">
                        <img src="<?= Yii::$app->view->theme->getUrl('/img/gallery/full/full-13.jpg'); ?>">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Focus on your growing business</h4>
                        <h6 class="category text-gray">10 min read</h6>
                        <p>
                            Helvetica letterpress bicycle rights banh mi keffiyeh af. Food truck shabby chic actually mixtape twee...
                        </p>
                    </div>
                    <div class="card-footer border-top">
                        <ul class="card-actions left-bottom">
                            <li>
                                <a href="javascript:void(0)" class="btn btn-default btn-flat">
                                Read More
                                </a>
                            </li>
                        </ul>
                        <ul class="card-actions icons right-bottom">
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-bookmark"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-share"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="card">
                    <header class="card-heading">
                        <h2 class="card-title">Website Analytics</h2>
                        <p>Unique Visitors vs Returning Visitors</p>
                        <ul class="card-actions icons  right-top">
                            <li>
                                <a href="javascript:void(0)" onClick="MaterialLab.dashboardWebStats()" data-toggle="refresh">
                                <i class="zmdi zmdi-refresh-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                    <li>
                                        <a href="javascript:void(0)">Option One</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Two</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body p-15">
                        <div id="website-stats" style="position: relative;height:265px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <header class="card-heading card-image app_primary_bg">
                        <!-- IMAGE GOES HERE -->
                        <img src="<?= Yii::$app->view->theme->getUrl('/img/headers/header-md-09.jpg'); ?>" alt="">
                        <h2 class="card-title left-bottom overlay text-white">Austin, TX</h2>
                        <ul class="card-actions icons right-top">
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert white-text"></i>
                                </a>
                                <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                    <li>
                                        <a href="javascript:void(0)">Option One</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Two</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body">
                        <p><span class="curr-dd"></span> <span class="curr-mmmm-dd"><sup></sup></span></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-center font-size-20 m-t-5">Today</h3>
                                <div class="text-center">
                                    <i class="wi wi-day-sunny font-size-50 m-b-5"></i>
                                    <h4 class=" font-size-20">78°C</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-center font-size-20 m-t-5">Tonight</h3>
                                <div class="text-center">
                                    <i class="wi wi-night-alt-lightning font-size-50 m-b-5"></i>
                                    <h4 class=" font-size-20">42°C</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-40">
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">TUE</div>
                                    <i class="wi wi-day-sunny font-size-20 m-b-5"></i>
                                    <div>66°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">WED</div>
                                    <i class="wi wi-day-cloudy font-size-20 m-b-5"></i>
                                    <div>71°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">THU</div>
                                    <i class="wi wi-day-sunny font-size-20 m-b-5"></i>
                                    <div>69°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">FRI</div>
                                    <i class="wi wi-day-cloudy-gusts font-size-30 m-b-5"></i>
                                    <div>62°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">SAT</div>
                                    <i class="wi wi-day-lightning font-size-30 m-b-5"></i>
                                    <div>59°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div>
                                    <div class="m-b-10">SUN</div>
                                    <i class="wi wi-day-storm-showers font-size-30 m-b-5"></i>
                                    <div>61°
                                        <span class="font-size-12">C</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <ul class="card-actions left-bottom">
                            <li>
                                <a href="javascript:void(0)" class="btn btn-default btn-flat">
                                10 Day Forecast
                                </a>
                            </li>
                        </ul>
                        <ul class="card-actions icons right-bottom">
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-bookmark"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                <i class="zmdi zmdi-share"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card type--profile">
                    <header class="card-heading card-background" id="card_img_02">
                        <img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/18.jpg'); ?>" alt="" class="img-circle">
                        <ul class="card-actions icons  right-top">
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert "></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right btn-primary">
                                    <li>
                                        <a href="javascript:void(0)">Option One</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Two</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Option Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body">
                        <h3 class="name">Fredrick Palmer</h3>
                        <span class="title">Frontend Developer</span>
                        <button type="button" class="btn btn-primary btn-round">Follow</button>
                    </div>
                    <footer class="card-footer border-top">
                        <div class="row row p-t-10 p-b-10">
                            <div class="col-xs-4"><span class="count">1420</span><span>Post</span></div>
                            <div class="col-xs-4"><span class="count">1.1m</span><span>Followers</span></div>
                            <div class="col-xs-4"><span class="count">320</span><span>Following</span></div>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card ">
                    <header class="card-heading app_primary_bg">
                        <h2 class="card-title text-white">Contacts</h2>
                        <div class="card-search">
                            <div class="form-group is-empty">
                                <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="zmdi zmdi-close"></i></a>
                                <input type="text" placeholder="Search and press enter..." class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <ul class="card-actions icons alt-actions right-top">
                            <li>
                                <a href="javascript:void(0)" data-card-search="open">
                                <i class="zmdi zmdi-search"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-sort-asc"></i>
                                </a>
                                <ul class="dropdown-menu btn-primary dropdown-menu-right">
                                    <li>
                                        <a href="javascript:void(0)">First Name</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"> Last Name</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </header>
                    <div class="card-body p-0">
                        <ul class="list-group ">
                            <a role="button" data-toggle="modal" href="javascript:void(0)" data-target="#contactEditUser" data-name="Gabriel Saunders" data-email="gabriel@materiallab.pro" data-phone="+1-202-555-0102" data-img="<?= Yii::$app->view->theme->getUrl('/img/profiles/07.jpg'); ?>" data-star="false">
                                <li class="list-group-item">
                                    <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/07.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                                    <div class="list-group-item-body">
                                        <div class="list-group-item-heading">Gabriel Saunders</div>
                                        <div class="list-group-item-text">gabriel@materiallab@pro</div>
                                    </div>
                                </li>
                            </a>
                            <a role="button" data-toggle="modal" href="javascript:void(0)" data-target="#contactEditUser" data-name="Shawna Cohen" data-email="shawna@materiallab.pro" data-phone="+1-202-555-0107" data-img="<?= Yii::$app->view->theme->getUrl('/img/profiles/06.jpg'); ?>">
                                <li class="list-group-item ">
                                    <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/06.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                                    <div class="list-group-item-body">
                                        <div class="list-group-item-heading">Shawna Cohen</div>
                                        <div class="list-group-item-text">shawna@materiallab@pro</div>
                                    </div>
                                </li>
                            </a>
                            <a role="button" data-toggle="modal" href="javascript:void(0)" data-target="#contactEditUser" data-name="Jason Kendall" data-email="jason@materiallab.pro" data-phone="+1-202-555-0154" data-img="<?= Yii::$app->view->theme->getUrl('/img/profiles/15.jpg'); ?>">
                                <li class="list-group-item ">
                                    <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/15.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                                    <div class="list-group-item-body">
                                        <div class="list-group-item-heading">Jason Kendall</div>
                                        <div class="list-group-item-text">jason@materiallab.pro</div>
                                    </div>
                                </li>
                            </a>
                            <a role="button" data-toggle="modal" href="javascript:void(0)" data-target="#contactEditUser" data-name="Thomas Banks" data-email="thomas@materiallab.pro" data-phone="+1-202-555-0143" data-img="<?= Yii::$app->view->theme->getUrl('/img/profiles/17.jpg'); ?>">
                                <li class="list-group-item ">
                                    <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/17.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                                    <div class="list-group-item-body">
                                        <div class="list-group-item-heading">Thomas Banks</div>
                                        <div class="list-group-item-text">thomas@materiallab.pro</div>
                                    </div>
                                </li>
                            </a>
                            <a role="button" data-toggle="modal" href="javascript:void(0)" data-target="#contactEditUser" data-name="Rebecca Harris" data-email="rebecca@materiallab.pro" data-phone="+1-202-555-0189" data-img="<?= Yii::$app->view->theme->getUrl('/img/profiles/11.jpg'); ?>">
                                <li class="list-group-item ">
                                    <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/11.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                                    <div class="list-group-item-body">
                                        <div class="list-group-item-heading">Rebecca Harrisr</div>
                                        <div class="list-group-item-text">rebecca@materiallab.pro</div>
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="card-footer border-top">
                        <ul class="more">
                            <li>
                                <a href="javascript:void(0)">View More</a>
                            </li>
                        </ul>
                        <ul class="card-actions icons right">
                            <li>
                                <button class="btn btn-primary btn-fab" data-toggle="modal" data-target="#newContactModal"><i class="zmdi zmdi-account-add"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDS $dashboard_content -->
    </div>
</div>
