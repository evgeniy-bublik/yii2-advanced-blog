<?php if ($relatedWorks) : ?>

    <section class="section section-35 section-md-75 section-xl-90 bg-gray-light novi-background">
        <div class="container text-center text-sm-left">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Related posts</h4>
                </div>
            </div>
            <div class="row row-30">

                <?php foreach ($relatedWorks as $work) : ?>

                    <?= $this->render('_related_work_item', [
                        'work' => $work,
                    ]); ?>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

<?php endif; ?>