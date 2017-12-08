<header class="page-head">
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-stick-up-clone="false" data-body-class="rd-navbar-static-smooth" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="60px" data-lg-stick-up-offset="60px" data-xl-stick-up-offset="60px" data-xxl-stick-up-offset="60px">
            <div class="rd-navbar-inner">
                <div class="rd-navbar-panel">
                    <button class="rd-navbar-toggle" data-custom-toggle=".rd-navbar-nav-wrap" data-custom-toggle-disable-on-blur="true"><span></span></button><a class="rd-navbar-brand brand" href="index.html"><img src="/images/logo-black.svg" width="139" height="22" alt="logo"/></a>
                </div>
                <div class="rd-navbar-group rd-navbar-search-wrap">
                    <div class="rd-navbar-nav-wrap">
                        <div class="rd-navbar-nav-inner">
                            <div class="rd-navbar-search">
                                <form class="rd-search" action="search-results.html" method="GET" data-search-live="rd-search-results-live">
                                    <div class="form-wrap">
                                        <label class="form-label" for="rd-search-form-input">Search...</label>
                                        <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                                        <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                    </div>
                                    <button class="rd-search-submit" type="submit"></button>
                                </form>
                                <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search, .rd-navbar-search-wrap"></button>
                            </div>

                            <?= $this->render('nav'); ?>
                            
                        </div>
                    </div>
                    <div class="rd-navbar-shop"><a class="novi-icon link-shop material-icons-shopping_cart" href="shop-cart.html"></a></div>
                </div>
            </div>
        </nav>
    </div>
</header>