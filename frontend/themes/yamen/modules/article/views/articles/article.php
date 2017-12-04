<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<!-- Start Pages Title Style1 -->
<section id="Page-title" class="Page-title-Style1">
    <div class="container inner-Pages">
        <div class="row">
            <div class="Page-title">
                <div class="col-md-6 Title-Pages">
                    <h2>Single Blog Post</h2>
                </div>
                <div class="col-md-6 Catogry-Pages">
                    <p>You are here :  <a href="#">Home</a>   /   Single Blog Post</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Pages Title Style1 -->
<!-- Start Blog -->
<section id="Latest-News" class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="col-md-8 Blog-Full">
                <div class="Title-Single">
                    <div class="Top-Title-Blog">
                        <h2><?= $article->title; ?></h2>
                    </div>
                    <div class="Bottom-Title-Blog">
                        <ul>
                            <li>
                                <i class="fa fa-user"></i>
                                <p>Автор : <a href="<?= Url::toRoute(['/core/index/about']); ?>">Evgeniy</a></p>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <p>Дата : <?= $model->getDate(); ?></p>
                            </li>
                            <li>
                                <i class="fa fa-folder-open"></i>
                                <p>Категории : <a href="#">Photography</a></p>
                            </li>
                            <li>
                                <i class="fa fa-comment"></i>
                                <p>Comments : <a href="#">31</a></p>
                            </li>
                            <li>
                                <i class="fa fa-heart"></i>
                                <p>Like : <a href="#">3</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="Single-Blog-Content">

                    <?php if ($article->image) : ?>

                        <div class="Post-Images">
                            <img src="<?= $article->getFullImage(); ?>" alt="<?= $article->title; ?>" width="771" height="434">
                        </div>

                    <?php endif; ?>

                    <div class="Post-Content">

                        <?= $article->description; ?>

                    </div>
                </div>

                <?php if ($article->tags) : ?>

                    <div class="Under-Post">
                        <div class="post-tags">
                            <i class="fa fa-tags"></i>
                            <?= implode(',', ArrayHelper::map($article->tags, 'id', function($tag){ return Html::a($tag->name, Url::toRoute(['/article/articles/tag', 'tagAlias' => $tag->alias])); })); ?>
                        </div>
                        <div id="shareIconsCount" class="Social-Content Social-Blog"></div>
                    </div>

                <?php endif; ?>

                <div class="divcod50"></div>
                <div class="Single-Blog-Comment">
                    <div class="Title-Comment">
                        <h3>
                        3 Comments</h2>
                    </div>
                    <div class="line-break"></div>
                    <div class="divcod20"></div>
                    <div class="Comments-Post">
                        <ul>
                            <li>
                                <div class="Block-Comment">
                                    <img src="<?= $this->theme->getUrl('/images/blog/Img-Comment.png'); ?>" alt="post footer" width="70" height="70">
                                    <h4>Habaza</h4>
                                    <span>Oct 14, 2014 - 08:07 pm <a href="#">Reply</a></span>
                                    <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. </p>
                                </div>
                                <ul>
                                    <li>
                                        <div class="Block-Comment">
                                            <img src="<?= $this->theme->getUrl('/images/blog/Img-Comment.png'); ?>" alt="post footer" width="70" height="70">
                                            <h4>Habaza</h4>
                                            <span>Oct 14, 2014 - 08:07 pm <a href="#">Reply</a></span>
                                            <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. </p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="Block-Comment">
                                    <img src="<?= $this->theme->getUrl('/images/blog/Img-Comment.png'); ?>" alt="post footer" width="70" height="70">
                                    <h4>Habaza</h4>
                                    <span>Oct 14, 2014 - 08:07 pm <a href="#">Reply</a></span>
                                    <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. </p>
                                </div>
                            </li>
                            <li>
                                <div class="Block-Comment">
                                    <img src="<?= $this->theme->getUrl('/images/blog/Img-Comment.png'); ?>" alt="post footer" width="70" height="70">
                                    <h4>Habaza</h4>
                                    <span>Oct 14, 2014 - 08:07 pm <a href="#">Reply</a></span>
                                    <p>Lorem ipsum dolor sit amet, mauris suspendisse viverra eleifend tortor tellus suscipit, tortor aliquet at nulla mus, dignissim neque, nulla neque. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="Add-Comment">
                    <div class="Title-Comment">
                        <h3>
                        Add Comment</h2>
                    </div>
                    <div class="line-break"></div>
                    <div class="divcod30"></div>
                    <div class="Comment-Form">
                        <form action="#" class="leave-comment contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="text" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-input">
                                        <input type="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-input">
                                        <input type="submit" class="btn btn-large main-bg" value="Add Comment">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <textarea class="txt-box textArea" name="message" cols="40" rows="7" id="messageTxt" placeholder="Comment" spellcheck="true" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog -->