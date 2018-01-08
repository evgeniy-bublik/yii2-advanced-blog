<?php
use app\modules\article\widgets\TagsWidget\Tags;
use app\modules\article\widgets\CategoriesWidget\Categories;
use app\modules\article\widgets\PopularArticlesWidget\PopularArticles;
use app\modules\core\widgets\ShareButtonsWidget\ShareButtons;
use yii\helpers\Url;

/* @var yii\web\View $this */
/* @var app\modules\article\models\Article $article */
?>
<section class="section section-30 section-xxl-40 section-xxl-66 section-xxl-bottom-90 novi-background bg-gray-dark page-title-wrap" style="background-image: url(/images/bg-blog.jpg);">
    <div class="container">
        <div class="page-title">
            <h2>Блог</h2>
        </div>
    </div>
</section>
<section class="section section-60 section-md-75 section-xl-90">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-8 col-xl-9">
                <article class="post post-single">

                    <?php if ($article->image) : ?>

                        <div class="post-image">
                            <figure>
                                <img src="<?= $article->getFullImage(); ?>" alt="<?= $article->title; ?>"/>
                            </figure>
                        </div>

                    <?php endif; ?>

                    <div class="post-header">
                        <h4><?= $article->title; ?></h4>
                    </div>
                    <div class="post-meta">
                        <ul class="list-bordered-horizontal">
                            <li>
                                <dl class="list-terms-inline">
                                    <dt>Дата</dt>
                                    <dd>
                                        <time datetime="<?= date('Y-m-d'); ?>"><?= $article->getDate('{monthName} {day}, {year}'); ?></time>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl class="list-terms-inline">
                                    <dt>Автор</dt>
                                    <dd>Евгений Бублик</dd>
                                </dl>
                            </li>
                            <!-- <li>
                                <dl class="list-terms-inline">
                                    <dt>Комментарии</dt>
                                    <dd>3</dd>
                                </dl>
                            </li> -->

                            <?php if ($category = $article->getCategory()) : ?>

                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>Категория</dt>
                                        <dd><?= $category->title; ?></dd>
                                    </dl>
                                </li>

                            <?php endif ; ?>

                        </ul>
                    </div>
                    <div class="divider-fullwidth bg-gray-light"></div>
                    <div class="post-body">

                        <?= $article->description; ?>

                    </div>

                    <?= ShareButtons::widget([
                        'wrapperOptions' => [
                            'class' => 'list-inline list-inline-xs',
                        ],
                        'registerShareButtons' => [
                            ShareButtons::BUTTON_FACEBOOK,
                            ShareButtons::BUTTON_VK,
                            ShareButtons::BUTTON_TWITTER,
                        ],
                        'link' => Url::toRoute(['/article/articles/article', 'articleAlias' => $article->alias], true),
                        'linkOptions' => [
                            'class' => 'novi-icon icon icon-xxs-small link-tundora',
                        ],
                    ]); ?>

                </article>
                <div class="divider-fullwidth bg-gray-lighter"></div>
                <!-- <div class="comment-list-wrap">
                    <h4>3 Comments</h4>
                    <div class="comment-list inset-md-right-60 inset-lg-right-30 inset-xl-right-100 offset-top-30">
                        <div class="comment-group">
                            <article class="comment">
                                <div class="unit unit-spacing-md flex-column flex-sm-row">
                                    <div class="unit-left">
                                        <figure><img src="/images/post-2-70x71.jpg" alt="" width="70" height="71"/>
                                        </figure>
                                    </div>
                                    <div class="unit-body">
                                        <div class="comment-body">
                                            <div class="comment-body-header">
                                                <div class="comment-meta">
                                                    <p class="user">July Mao</p>
                                                    <ul class="list-inline list-icon-meta">
                                                        <li><a class="link-group link-group-baseline" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-thumb-up-outline"></span><span>Like</span></a></li>
                                                        <li><a class="link-group" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-comment-outline"></span><span>Reply</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="comment-time">
                                                    <div class="object-inline">
                                                        <time datetime="2016-02-16">Feb 16, 7:42 PM</time><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-clock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-body-text">
                                                <p>The topic you describe here is really important. However, the mentioned type of training cannot be applied to anyone.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <div class="comment-group-reply">
                                <article class="comment">
                                    <div class="unit unit-spacing-md flex-column flex-sm-row">
                                        <div class="unit-left">
                                            <figure><img src="/images/post-3-70x71.jpg" alt="" width="70" height="71"/>
                                            </figure>
                                        </div>
                                        <div class="unit-body">
                                            <div class="comment-body">
                                                <div class="comment-body-header">
                                                    <div class="comment-meta">
                                                        <p class="user">John doe</p>
                                                        <ul class="list-inline list-icon-meta">
                                                            <li><a class="link-group link-group-baseline" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-thumb-up-outline"></span><span>Like</span></a></li>
                                                            <li><a class="link-group" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-comment-outline"></span><span>Reply</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="comment-time">
                                                        <div class="object-inline">
                                                            <time datetime="2016-02-16">Feb 16, 7:42 PM</time><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-clock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-body-text">
                                                    <p>You are absolutely right! But here, we have everything necessary to prepare even the pre - beginners to extensive physical training.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="comment-group">
                            <article class="comment">
                                <div class="unit unit-spacing-md flex-column flex-sm-row">
                                    <div class="unit-left">
                                        <figure><img src="/images/post-4-70x71.jpg" alt="" width="70" height="71"/>
                                        </figure>
                                    </div>
                                    <div class="unit-body">
                                        <div class="comment-body">
                                            <div class="comment-body-header">
                                                <div class="comment-meta">
                                                    <p class="user">Mila MOa</p>
                                                    <ul class="list-inline list-icon-meta">
                                                        <li><a class="link-group link-group-baseline" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-thumb-up-outline"></span><span>Like</span></a></li>
                                                        <li><a class="link-group" href="#"><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-comment-outline"></span><span>Reply</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="comment-time">
                                                    <div class="object-inline">
                                                        <time datetime="2016-02-16">Feb 16, 7:42 PM</time><span class="novi-icon icon icon-xxs-smaller icon-dusty-gray mdi mdi-clock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-body-text">
                                                <p>Very useful post! Thanks for sharing! Now I’ll be planning my visit to your gym to take part in some fitness classes.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="offset-top-1">
                    <h4>Leave a comment</h4>
                    <div class="form-classic-wrap">
                        <form class="rd-mailform form-classic form-classic-bordered label-outside">
                            <div class="form-wrap">
                                <label class="form-label-outside" for="comment-message">Message:</label>
                                <textarea class="form-input" id="comment-message" name="message" data-constraints="@Required"></textarea>
                            </div>
                            <div class="offset-top-30">
                                <button class="button button-primary" type="submit" style="min-width: 200px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="blog-aside">
                    <!-- <div class="blog-aside-item">
                        <form class="rd-search rd-search-classic" action="search-results.html" method="GET">
                            <div class="form-wrap">
                                <label class="form-label" for="rd-search-form-input-1">Search...</label>
                                <input class="form-input" id="rd-search-form-input-1" type="text" name="s" autocomplete="off">
                            </div>
                            <button class="rd-search-submit" type="submit"></button>
                        </form>
                    </div> -->

                    <?= Categories::widget(); ?>

                    <?= PopularArticles::widget(); ?>

                    <?= Tags::widget(); ?>

                </div>
            </div>
        </div>
    </div>
</section>