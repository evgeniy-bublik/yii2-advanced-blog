<aside id="app_sidebar-left">
    <nav id="app_main-menu-wrapper" class="scrollbar">
        <div class="sidebar-inner sidebar-push">
            <div class="card profile-menu" id="profile-menu">
                <header class="card-heading card-img alt-heading">
                    <div class="profile">
                        <header class="card-heading card-background" id="card_img_02">
                            <img src="<?= Yii::$app->view->theme->getUrl('/img/profiles/18.jpg'); ?>" alt="" class="img-circle max-w-75 mCS_img_loaded">
                        </header>
                        <a href="javascript:void(0)" class="info" data-profile="open-menu"><span>admin@materiallab.pro</span></a>
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
                        <a href="login.html"><i class="zmdi zmdi-sign-in"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="sidebar-header">NAVIGATION</li>
                <li class="active"><a href="index.html"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a></li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-widgets"></i>Cards</a>
                    <ul class="nav-sub">
                        <li><a href="card-templates.html">Card Templates</a></li>
                        <li><a href="card-demos.html">Card Demos</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-view-quilt"></i>App Views</a>
                    <ul class="nav-sub">
                        <li><a href="app-mail.html">Mail</a></li>
                        <li class="nav-dropdown">
                            <a href="#">E-Commerce</a>
                            <ul class="nav-sub">
                                <li><a href="ecommerce-dashboard.html">Dashboard</a></li>
                                <li><a href="ecommerce-products.html">Products</a></li>
                                <li><a href="ecommerce-customers.html">Customers</a></li>
                                <li><a href="ecommerce-settings.html">Settings</a></li>
                            </ul>
                        </li>
                        <li><a href="app-chat.html">Chat</a></li>
                        <li><a href="app-calendar.html">Calendar</a></li>
                        <li><a href="app-contacts.html">Contacts</a></li>
                        <li><a href="app-locations.html">Office Locations</a></li>
                        <li><a href="app-notes.html">Notes</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-google-pages"></i>Page Views</a>
                    <ul class="nav-sub">
                        <li><a href="page-profile.html">Profile</a></li>
                        <li><a href="page-invoice.html">Invoice</a></li>
                        <li><a href="page-timeline.html">Timeline</a></li>
                        <li><a href="page-contact.html">Contact Us</a></li>
                        <li><a href="page-pricing-tables.html">Pricing Tables</a></li>
                        <li><a href="page-photo-gallery.html">Photo Gallery</a></li>
                        <li><a href="page-400.html">400</a></li>
                        <li><a href="page-500.html">500</a></li>
                        <li><a href="page-maintenance.html">Maintenance</a></li>
                        <li class="nav-dropdown">
                            <a href="#">Authentication</a>
                            <ul class="nav-sub">
                                <li><a href="login.html">Login &amp; Register</a></li>
                                <li><a href="lock-screen.html">Lock Screen</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><span></span><i class="zmdi zmdi-view-carousel"></i>Layouts</a>
                    <ul class="nav-sub">
                        <li class="nav-dropdown">
                            <a href="#"><span></span>App Layouts</a>
                            <ul class="nav-sub">
                                <li>
                                    <div class="radio block"><label><input type="radio" name="layoutMode" value="" checked>Full Width</label></div>
                                </li>
                                <li>
                                    <div class="radio block"><label><input type="radio" name="layoutMode" value="boxed-layout">Boxed Layout</label></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#"><span></span>Page Layouts</a>
                            <ul class="nav-sub">
                                <li><a href="layout-fullwidth-v1.html">Full Width v1</a></li>
                                <li><a href="layout-fullwidth-v2.html">Full Width v2</a></li>
                                <li><a href="layout-boxed-v1.html">Boxed Layout v1</a></li>
                                <li><a href="layout-boxed-v2.html">Boxed Layout v2</a></li>
                                <li><a href="layout-left-sidenav-v1.html">Left Side Nav v1</a></li>
                                <li><a href="layout-left-sidenav-v2.html">Left Side Nav v2</a></li>
                                <li><a href="layout-right-sidenav-v1.html">Right Side Nav v1</a></li>
                                <li><a href="layout-right-sidenav-v2.html">Right Side Nav v2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-palette"></i>User Interface</a>
                    <ul class="nav-sub">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-animations.html">Animations</a></li>
                        <li><a href="ui-badges-labels.html">Badges &amp; Labels</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-grid.html">Grid System</a></li>
                        <li><a href="ui-icons.html">Icons</a></li>
                        <li><a href="ui-list.html">List</a></li>
                        <li><a href="ui-preloaders.html">Preloaders</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-ungroup"></i>Components</a>
                    <ul class="nav-sub">
                        <li><a href="component-collapsible.html">Collapsible</a></li>
                        <li><a href="component-chips.html">Chips</a></li>
                        <li><a href="component-drawers.html">Drawers</a></li>
                        <li><a href="component-dropdowns.html">Dropdowns</a></li>
                        <li><a href="component-modals.html">Modals</a></li>
                        <li><a href="component-notifications-dialogs.html">Notifications &amp; Dialogs</a></li>
                        <li><a href="component-scrollable.html">Scrollable</a></li>
                        <li><a href="component-progressbars-sliders.html">Sliders &amp; Progressbars</a></li>
                        <li><a href="component-tabs.html">Tabs &amp; Pills</a></li>
                        <li><a href="component-tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                        <li><a href="component-toolbars.html">Toolbars</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-chart"></i>Charts</a>
                    <ul class="nav-sub">
                        <li><a href="charts-chartist.html">Chartist</a></li>
                        <li><a href="charts-c3.html">C3 Charts</a></li>
                        <li><a href="charts-chartjs.html">Chartjs</a></li>
                        <li><a href="charts-morrisjs.html">Morris.js Charts</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-view-subtitles"></i>Forms</a>
                    <ul class="nav-sub">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-components.html">Form Components</a></li>
                        <li><a href="form-layouts.html">Form Layouts</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="nav-dropdown">
                    <a href="#"><i class="zmdi zmdi-view-headline"></i>Tables</a>
                    <ul class="nav-sub">
                        <li><a href="tables.html">Basic Tables</a></li>
                        <li><a href="tables-datatables.html">Data Tables</a></li>
                    </ul>
                </li>
                <li class="sidebar-header">EXTRAS</li>
                <li class="nav-dropdown">
                    <a href="#" title="Menu Levels">
                    <i class="zmdi zmdi-folder"></i>Menu Levels</a>
                    <ul class="nav-sub">
                        <li>
                            <a href="javascript:;" title="Level 2.1">
                            <i class="fa fa-fw fa-file"></i> Level 1.1
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="Level 2.2">
                            <i class="fa fa-fw fa-file"></i> Level 1.2
                            </a>
                        </li>
                        <li class="nav-dropdown">
                            <a href="#" title="Level 2.3">
                            <i class="fa fa-fw fa-folder-open"></i> Level 1.3
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="javascript:;" title="Level 3.1">
                                    <i class="fa fa-fw fa-file"></i> Level 2.1
                                    </a>
                                </li>
                                <li class="nav-dropdown">
                                    <a href="#" title="Level 3.2">
                                    <i class="fa fa-fw fa-folder-open"></i> Level 2.2
                                    </a>
                                    <ul class="nav-sub">
                                        <li>
                                            <a href="javascript:;" title="Level 4.1">
                                            <i class="fa fa-fw fa-file"></i> Level 3.1
                                            </a>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a href="#" title="Level 4.2">
                                            <i class="fa fa-fw fa-folder-open"></i> Level 3.2
                                            </a>
                                            <ul class="nav-sub">
                                                <li class="nav-dropdown">
                                                    <a href="#" title="Level 5.1">
                                                    <i class="fa fa-fw fa-folder-open"></i> Level 4.1
                                                    </a>
                                                    <ul class="nav-sub">
                                                        <li>
                                                            <a href="javascript:;" title="Level 6.1">
                                                            <i class="fa fa-fw fa-file"></i> Level 5.1
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" title="Level 6.2">
                                                            <i class="fa fa-fw fa-file"></i> Level 5.2
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" title="Level 5.2">
                                                    <i class="fa fa-fw fa-file"></i> Level 4.2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" title="Level 5.3">
                                                    <i class="fa fa-fw fa-file"></i> Level 4.3
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="helper-classes.html"><i class="zmdi zmdi-info"></i>Helper Classes</a></li>
            </ul>
        </div>
    </nav>
</aside>