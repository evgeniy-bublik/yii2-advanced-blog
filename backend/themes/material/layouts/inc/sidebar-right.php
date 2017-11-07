<aside id="app_sidebar-right">
    <div class="sidebar-inner sidebar-overlay">
        <div class="tabpanel">
            <ul class="nav nav-tabs nav-justified">
                <li class="active" role="presentation"><a href="#sidebar_chat" data-toggle="tab" aria-expanded="true">Chat</a></li>
                <li role="presentation"><a href="#sidebar_activity" data-toggle="tab">Activity</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="sidebar_chat">
                    <form class="m-l-15 m-r-15 m-t-30">
                        <div class="input-group search-target">
                            <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
                            <div class="form-group is-empty">
                                <input type="text" value="" placeholder="Filter contacts..." class="form-control" data-search-trigger="open">
                            </div>
                        </div>
                    </form>
                    <ul class="description">
                        <li class="title">
                            Online
                        </li>
                    </ul>
                    <ul class="list-group p-0">
                        <li class="list-group-item" data-chat="open" data-chat-name="John Smith">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/07.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini success status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">John Smith</div>
                                <div class="list-group-item-text">New York, NY</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="Allison Grayce">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/05.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini success status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Allison Grayce</div>
                                <div class="list-group-item-text">Seattle, WA</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="Ashley Ford">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/18.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini success status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Ashley Ford</div>
                                <div class="list-group-item-text">Denver, CO</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="Johanna Kollmann">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/11.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini success status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Johanna Kollmann </div>
                                <div class="list-group-item-text">Palo Alto, Ca</div>
                            </div>
                        </li>
                    </ul>
                    <ul class="description">
                        <li class="title">
                            Busy
                        </li>
                    </ul>
                    <ul class="list-group p-0">
                        <li class="list-group-item" data-chat="open" data-chat-name="Mike Jones">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/03.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini warning status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Mike Jones </div>
                                <div class="list-group-item-text">San Francisco, CA</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="Nikki Clark">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/06.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini warning status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Nikki Clark </div>
                                <div class="list-group-item-text">Sarasota, FL</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="Jason Kendall">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/15.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini warning status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Jason Kendall </div>
                                <div class="list-group-item-text">New York, NY</div>
                            </div>
                        </li>
                    </ul>
                    <ul class="description">
                        <li class="title">
                            Offline
                        </li>
                    </ul>
                    <ul class="list-group p-0">
                        <li class="list-group-item" data-chat="open" data-chat-name="Josh Hemsley">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/16.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini danger status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">Josh Hemsley</div>
                                <div class="list-group-item-text">Salem, MA</div>
                            </div>
                        </li>
                        <li class="list-group-item" data-chat="open" data-chat-name="James Hart">
                            <span class="pull-left"><img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/09.jpg'); ?>" alt="" class="img-circle max-w-40 m-r-10 "></span>
                            <i class="badge mini danger status"></i>
                            <div class="list-group-item-body">
                                <div class="list-group-item-heading">James Hart</div>
                                <div class="list-group-item-text">Salem, MA</div>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-primary btn-fab btn-fab-sm animate-fab" data-chat="open" id="chat_fab_new">
                    <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
                <div class="tab-pane fade" id="sidebar_activity">
                    <div class="sidebar-timeline">
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">15 minutes ago</small>
                                <p><a href="#" class="accent">Mike Jones</a> fixed z-index conflict sidebar.scss</p>
                            </div>
                        </div>
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">30 minutes ago</small>
                                <p><a href="javascript:void(0)" class="accent">Hazel  Dean</a> left a comment on product page designs.</p>
                                <p><em>"Yuccie shoreditch trust fund, artisan tumblr sustainable cronut unicorn blog seitan. "</em></p>
                            </div>
                        </div>
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">45 minutes ago</small>
                                <p><a href="javascript:void(0)" class="accent">Molly</a> requested time off for training.</p>
                                <p><em>"Snackwave church-key cardigan you probably haven't heard of them, asymmetrical microdosing cronut "</em></p>
                            </div>
                        </div>
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">3 hours ago</small>
                                <p><a href="javascript:void(0)" class="accent">Frederick  Roy</a> commented your post.</p>
                                <p><em>"Skateboard dreamcatcher la croix, edison bulb sustainable sriracha vexillologist kombucha master cleanse."</em></p>
                            </div>
                        </div>
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">1 hour ago</small>
                                <p><a href="javascript:void(0)" class="accent">Holly Cobb</a> Uploaded 6 new photos.</p>
                            </div>
                        </div>
                        <div class="time-item">
                            <div class="item-info">
                                <small class="text-muted">5 hours ago</small>
                                <p><a href="javascript:void(0)" class="accent">Neal Stephens</a> setup a meeting with<a href="#" class="text-success"> Jason Kendall</a>.</p>
                                <p><em>"Authentic aesthetic tattooed, PBR&B squid tote bag schlitz vaporware glossier yr man braid direct trade disrupt poke.  "</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>