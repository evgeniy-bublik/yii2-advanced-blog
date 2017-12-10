<ul class="list-inline list-inline-reset">

  <?php foreach ($socialLinks as $link) : ?>

      <li><a class="<?= $link->link_class; ?>" href="<?= $link->href; ?>" target="_blank"></a></li>

  <?php endforeach; ?>

</ul>