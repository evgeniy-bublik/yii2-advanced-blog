<div class="col-md-6 col-lg-4 col-xl-3">
    <h6 class="page-prefoot-header">Случайные посты</h6>
    <div class="post-preview-wrap post-preview-wrap-md">

      <?php foreach ($articles as $article) : ?>

            <?= $this->render('_item_default_article', [
                'article' => $article,
            ]); ?>

        <?php endforeach; ?>

    </div>
</div>