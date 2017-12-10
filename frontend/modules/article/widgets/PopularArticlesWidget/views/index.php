<div class="blog-aside-item">
    <h6>Популярные публикации</h6>
    <div class="offset-top-30">

        <?php foreach ($articles as $article) : ?>

            <?= $this->render('_item_article', [
                'article' => $article,
            ]); ?>

        <?php endforeach; ?>

    </div>
</div>