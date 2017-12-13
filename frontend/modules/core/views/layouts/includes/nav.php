<?php
use yii\helpers\Url;

/* @var yii\web\View $this */
?>
<ul class="rd-navbar-nav">
    <li class="active"><a href="/">Главная</a>
    </li>
    <li>
        <a href="#">Features</a>
        <ul class="rd-navbar-dropdown">
            <li><a href="extras.html">Extras</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Pages</a>
        <ul class="rd-navbar-megamenu">
            <li>
                <h5 class="rd-megamenu-header">Gallery</h5>
                <ul class="rd-navbar-list">
                    <li><a href="gallery-grid.html">Grid gallery</a></li>
                    <li><a href="gallery-masonry.html">Masonry gallery</a></li>
                    <li><a href="gallery-cobbles.html">Cobbles gallery</a></li>
                    <li><a href="gallery-item.html">Gallery item</a></li>
                </ul>
                <h5 class="rd-megamenu-header">Pages</h5>
                <ul class="rd-navbar-list">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="about-us.html">About us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact-us.html">Contact us</a></li>
                </ul>
            </li>
            <li>
                <h5 class="rd-megamenu-header">Pages</h5>
                <ul class="rd-navbar-list">
                    <li><a href="appointment.html">Appointment</a></li>
                    <li><a href="clients.html">Clients</a></li>
                    <li><a href="clients-testimonials.html">Clients testimonials</a></li>
                    <li><a href="our-team.html">Our team</a></li>
                    <li><a href="team-member-profile.html">Team member profile</a></li>
                    <li><a href="careers.html">Careers</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                </ul>
            </li>
            <li>
                <h5 class="rd-megamenu-header">Extras</h5>
                <ul class="rd-navbar-list">
                    <li><a href="404-page.html">404 Page</a></li>
                    <li><a href="503-page.html">503 Page</a></li>
                    <li><a href="maintenance.html">Maintenance</a></li>
                    <li><a href="coming-soon.html">Coming soon</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="search-results.html">Search results</a></li>
                    <li><a href="privacy-policy.html">Terms of use</a></li>
                </ul>
            </li>
            <li>
                <h5 class="rd-megamenu-header">Layout</h5>
                <ul class="rd-navbar-list">
                    <li><a href="header-default.html">Header Default</a></li>
                    <li><a href="header-corporate-light.html">Header Corporate Light</a></li>
                    <li><a href="header-corporate-dark.html">Header Corporate Dark</a></li>
                    <li><a href="footer-default.html">Footer Default</a></li>
                    <li><a href="footer-widget.html">Footer Widget</a></li>
                    <li><a href="footer-corporate.html">Footer Corporate</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="<?= Url::toRoute(['/portfolio/works/index']); ?>">Портфолио</a>
    </li>
    <li>
        <a href="<?= Url::toRoute(['/article/articles/articles']); ?>">Блог</a>
    </li>
    <li>
        <a href="#">Shop</a>
        <ul class="rd-navbar-dropdown">
            <li><a href="shop-list.html">Shop list</a>
            </li>
            <li><a href="shop-grid.html">Shop grid</a>
            </li>
            <li><a href="shop-product.html">Shop product</a>
            </li>
            <li><a href="shop-cart.html">Shop cart</a>
            </li>
            <li><a href="shop-checkout.html">Shop checkout</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#">Components</a>
        <ul class="rd-navbar-dropdown">
            <li><a href="accordion.html">Accordion</a>
            </li>
            <li><a href="buttons.html">Buttons</a>
            </li>
            <li><a href="grid.html">Grid</a>
            </li>
            <li><a href="forms.html">Forms</a>
            </li>
            <li><a href="icons.html">Icons</a>
            </li>
            <li><a href="icon-lists.html">Icon lists</a>
            </li>
            <li><a href="progress-bars.html">Progress bars</a>
            </li>
            <li><a href="tabs.html">Tabs</a>
            </li>
            <li><a href="table-styles.html">Table styles</a>
            </li>
            <li><a href="typography.html">Typography</a>
            </li>
        </ul>
    </li>
</ul>