<?php
use yii\helpers\Url;
?>
<!-- Start Navbar -->
<div class="Navbar-Header navbar basic" data-sticky="true">
    <div class="container">
        <div class="row">
            <div class="Logo-Header col-md-4">
                <a class="navbar-logo" href="/"></a>
            </div>
            <div class="right-wrapper">
                <div class="Icons-Search">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="Block-Search">
                    <input id="m_search" name="s" type="text" placeholder="Type your search keyword here and hit Enter...">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="collapse pull-right navbar-collapse">
                <div id="cssmenu" class="Menu-Header top-menu">
                    <ul>
                        <li>
                            <a href="<?= Url::toRoute(['/core/index/index']); ?>">Главная</a>
                        </li>
                        <li class="has-sub yamm-fullwidth">
                            <a href="#">Features</a>
                            <ul>
                                <li>
                                    <div class="col-md-3">
                                        <h5>Header Styles</h5>
                                        <ul>
                                            <li><a href="elements/header_01.html">Header 01</a></li>
                                            <li><a href="elements/header_02.html">Header 02</a></li>
                                            <li><a href="elements/header_03.html">Header 03</a></li>
                                            <li><a href="elements/header_04.html">Header 04</a></li>
                                            <li><a href="elements/header_05.html">Header 05</a></li>
                                            <li><a href="elements/header_06.html">Header 06</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Footer Styles</h5>
                                        <ul>
                                            <li><a href="elements/footer_01.html">Footer 01</a></li>
                                            <li><a href="elements/footer_02.html">Footer 02</a></li>
                                            <li><a href="elements/footer_03.html">Footer 03</a></li>
                                            <li><a href="elements/footer_04.html">Footer 04</a></li>
                                            <li><a href="elements/footer_05.html">Footer 05</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Page Title img Styles</h5>
                                        <ul>
                                            <li><a href="elements/page-title_01.html">Pattern BG</a></li>
                                            <li><a href="elements/page-title_02.html">Polygon BG</a></li>
                                            <li><a href="elements/page-title_05.html">Blue Color Overlay</a></li>
                                            <li><a href="elements/page-title_06.html">Dark Color Overlay</a></li>
                                            <li><a href="elements/page-title_09.html">Big Title Style</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Page Title color Styles</h5>
                                        <ul>
                                            <li><a href="elements/page-title_03.html">Light Color BG</a></li>
                                            <li><a href="elements/page-title_04.html">Dark Color BG</a></li>
                                            <li><a href="elements/page-title_07.html">Centered Dark Background</a></li>
                                            <li><a href="elements/page-title_08.html">Centered Light Background</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub yamm-fullwidth">
                            <a href="#">Pages</a>
                            <ul>
                                <li>
                                    <div class="col-md-3">
                                        <h5>Inner Pages 1</h5>
                                        <ul>
                                            <li><a href="about.html">About Us 1</a></li>
                                            <li><a href="about_v2.html">About Us 2</a></li>
                                            <li><a href="about_me.html">About Me</a></li>
                                            <li><a href="team.html">Team Members 1</a></li>
                                            <li><a href="team_v2.html">Team Members 2</a></li>
                                            <li><a href="careers.html">Careers / Jobs</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Inner Pages 2</h5>
                                        <ul>
                                            <li><a href="services.html">Services 1</a></li>
                                            <li><a href="services_v2.html">Services 2</a></li>
                                            <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                            <li><a href="register.html">Register Page</a></li>
                                            <li><a href="sitemap.html">SiteMap Page</a></li>
                                            <li><a href="faq.html">FAQ Page</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>OTHER PAGES</h5>
                                        <ul>
                                            <li><a href="contact.html">Contact Us 1</a></li>
                                            <li><a href="contact_v2.html">Contact Us 2</a></li>
                                            <li><a href="404_error.html">404 Error Page</a></li>
                                            <li><a href="coming_soon.html">Coming Soon<span>New</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>LINKS WITH ICONS</h5>
                                        <ul>
                                            <li><a href="#">link 1<i class="fa fa-cloud-download"></i></a></li>
                                            <li><a href="#">link 2<i class="fa fa-gears"></i></a></li>
                                            <li><a href="#">link 3<i class="fa fa-refresh"></i></a></li>
                                            <li><a href="#">link 4<i class="fa fa-tree"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#">Portfolio</a>
                            <ul>
                                <li>
                                    <a href="#">Portfolio Classic</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_classic_2col.html">Portfolio Classic 2Col</a></li>
                                        <li><a href="portfolio_classic_3col.html">Portfolio Classic 3Col</a></li>
                                        <li><a href="portfolio_classic_4col.html">Portfolio Classic 4Col</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio Masonry</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_masonry_2col.html">Portfolio Masonry 2Col</a></li>
                                        <li><a href="portfolio_masonry_3col.html">Portfolio Masonry 3Col</a></li>
                                        <li><a href="portfolio_masonry_4col.html">Portfolio Masonry 4Col</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio Thumbnails</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_style_1.html">Portfolio Style 1</a></li>
                                        <li><a href="portfolio_style_2.html">Portfolio Style 2</a></li>
                                        <li><a href="portfolio_style_3.html">Portfolio Style 3</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio Gallery</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_gallery_2col.html">Portfolio Gallery 2Col</a></li>
                                        <li><a href="portfolio_gallery_3col.html">Portfolio Gallery 3Col</a></li>
                                        <li><a href="portfolio_gallery_4col.html">Portfolio Gallery 4Col</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Portfolio Fullwidth</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_fullwidth_2col.html">Portfolio Fullwidth 2Col</a></li>
                                        <li><a href="portfolio_fullwidth_3col.html">Portfolio Fullwidth 3Col</a></li>
                                        <li><a href="portfolio_fullwidth_4col.html">Portfolio Fullwidth 4Col</a></li>
                                    </ul>
                                </li>
                                <li><a href="portfolio_single.html">Portfolio Single</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::toRoute(['/article/articles/articles']); ?>">Публикации</a>
                        </li>
                        <li class="has-sub">
                            <a href="#">Shop</a>
                            <ul>
                                <li class="open-left">
                                    <a href="#">Shop Catalog List</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop_full_width.html">Full Width</a></li>
                                        <li><a href="shop_grid_view.html">Grid View</a></li>
                                        <li><a href="shop_list_view.html">List View</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop_single_item.html">Shop Catalog Item</a></li>
                                <li><a href="shop_cart.html">Shop Cart Page</a></li>
                                <li><a href="shop_checkout.html">Checkout Page</a></li>
                            </ul>
                        </li>
                        <li class="has-sub yamm-fullwidth">
                            <a href="#">Elements</a>
                            <ul>
                                <li>
                                    <div class="col-md-6">
                                        <h5>Group 1</h5>
                                        <ul>
                                            <li><a href="elements/accordions.html">Accordions<i class="fa fa-bars"></i></a></li>
                                            <li><a href="elements/alert-box.html">Alert Boxes<i class="fa fa-exclamation"></i></a></li>
                                            <li><a href="elements/animations.html">Animations<i class="fa fa-magic"></i></a></li>
                                            <li><a href="elements/blockquotes.html">Block Quotes<i class="fa fa-quote-left"></i></a></li>
                                            <li><a href="elements/buttons.html">Buttons<i class="fa fa-link"></i></a></li>
                                            <li><a href="elements/counters.html">Counters<i class="fa fa-clock-o"></i></a></li>
                                            <li><a href="elements/components.html">Components<i class="fa fa-play"></i></a></li>
                                            <li><a href="elements/elements-forms.html">Forms<i class="fa fa-list"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Group 2</h5>
                                        <ul>
                                            <li><a href="elements/features-boxes.html">Features Boxes<i class="fa fa-random"></i></a></li>
                                            <li><a href="elements/maps.html">Maps<i class="fa fa-map-marker"></i></a></li>
                                            <li><a href="elements/bars.html">Progress Bar<i class="fa fa-list-alt"></i></a></li>
                                            <li><a href="elements/promo-boxes.html">Promo Boxes<i class="fa fa-rocket"></i></a></li>
                                            <li><a href="elements/social-icons.html">Social Icons<i class="fa fa-share-alt"></i></a></li>
                                            <li><a href="elements/tabs.html">Tabs<i class="fa fa-star"></i></a></li>
                                            <li><a href="elements/bootstrap-tables.html">Tables<i class="fa fa-table"></i></a></li>
                                            <li><a href="elements/typography.html">Typography<i class="fa fa-text-height"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar -->
