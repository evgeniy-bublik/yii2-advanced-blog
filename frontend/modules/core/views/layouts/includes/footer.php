<?php
use app\modules\core\widgets\SocialLinksWidget\SocialLinks;
?>

<footer class="section page-foot section-35 bg-cod-gray novi-background">
  <div class="container text-center">
    <div class="row row-15 flex-row-md-reverse justify-content-md-between align-items-md-center">
      <div class="col-md-6 text-md-right">
        <div class="group-sm group-middle">
          <p class="font-italic text-default">Я в социальных сетях:</p>

          <?= SocialLinks::widget(); ?>

        </div>
      </div>
      <div class="col-md-6 text-md-left">
        <p class="rights text-default"><span class="copyright-year"></span><span>&nbsp;&#169;&nbsp;</span><span>Starbis.&nbsp;</span><a class="link-light-2" href="privacy-policy.html">Privacy Policy</a></p>
      </div>
    </div>
  </div>
</footer>