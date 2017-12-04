<?php

namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use yii\behaviors\TimestampBehavior;
use common\behaviors\ThumbBehavior;
use common\behaviors\DateTimeBehavior;
use yii\helpers\ArrayHelper;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;
use yii\db\Expression;
use yii\helpers\Url;
use trntv\yii\datetime\DateTimeWidget;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
use app\modules\core\widgets\Switchery;

class Article extends BaseArticle
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['alias', 'unique'],
                ['alias', 'match', 'pattern' => '/^[a-z\d-]+[a-z\d]$/'],
                //['tagsIds', 'exist', 'targetClass' => ArticleTag::className(), 'targetAttribute' => 'id'],
                ['tagsIds', 'safe'],
            ]
        );
    }

    public function behaviors()
    {
        return  [
            'thumbBehavior' => [
                'class' => ThumbBehavior::className(),
                'fileAttribute' => 'image', //атрибут модели для картинки
                'saveDir' => 'files/articles/', //путь для сохранения картинок
                'thumbsSaveDir' => 'files/articles/thumbs/', // путь для сохранения превью картинок
                'previewSize' => [[700, 300]] //размеры генерируемых превью
            ],
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            'dateBehavior' => [
                'class' => DateTimeBehavior::className(),
                'dateTimeFields' => [
                    'date'
                ],
            ],
            'tagsBahevior' => [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
                'relations' => [
                    'tagsIds' => 'tags',
                ],
            ],
            'formBehavior' => [
                'class' => FormCreatorBehavior::className(),
                'type' => FormCreatorBehavior::TAB_FORM,
                'wrapperBlockButtonsOptions' => [
                    'class' => 'card-footer',
                ],
                'cancelButtonOptions' => [
                    'updateButtonOptions' => [
                        'htmlOptions' => [
                            'class' => 'btn btn-green btn-flat',
                        ],
                    ],
                    'createButtonOptions' => [
                        'htmlOptions' => [
                            'class' => 'btn btn-primary btn-flat',
                        ],
                    ],
                ],
                'attributes' => [
                    'title',
                    'alias',
                    'small_description' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                    'description' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => CKEditor::className(),
                        'widgetOptions' => [
                            'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                                'preset' => 'full',
                            ]),
                        ],
                    ],
                    'date' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => DateTimeWidget::className(),
                        'widgetOptions' => [
                            'phpDatetimeFormat' => 'dd.MM.yyyy, HH:mm:ss',
                            'clientOptions'     => [
                                'sideBySide'        => true,
                                'showClear'         => true,
                                'showClose'         => true,
                                'toolbarPlacement'  => 'bottom'
                            ],
                        ],
                    ],
                    'image' => function($form, $model) {
                        return $form->field($model, 'image')->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                            'pluginOptions' => [
                                'initialPreviewAsData' => true,
                                'initialPreview' => ($model->image) ? [$model->getFullImage()] : [],
                                'overwriteInitial' => false,
                                'deleteUrl' => Url::toRoute(['/article/articles/delete-preview', 'id' => $model->id]),
                            ],
                        ]);
                    },
                    'tagsIds' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => Select2::classname(),
                        'widgetOptions' => [
                            'data' => $this->getListTags(),
                            'options' => [
                                'placeholder' => 'Select a tag ...',
                                'multiple' => true
                            ],
                        ],
                    ],
                    'active' => [
                        'type'        => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => Switchery::className(),
                        'widgetOptions' => [
                            'options' => [
                                'label' => false,
                            ],
                        ],
                    ],
                    'meta_title',
                    'meta_description' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                    'meta_keywords' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                ],
                'tabOptions' => [
                    'tabs' => [
                        [
                            'label' => 'Primary',
                            'tabAttributes' => [
                                'title',
                                'alias',
                                'small_description',
                                'description',
                                'date',
                                'image',
                                'tagsIds',
                                'active',
                            ],
                        ],
                        [
                            'label' => 'Meta',
                            'tabAttributes' => [
                                'meta_title',
                                'meta_description',
                                'meta_keywords',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksArticleCategory()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['article_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(ArticleTag::className(), ['id' => 'tag_id'])
            ->viaTable(ArticleLinksTagArticle::tableName(), ['article_id' => 'id']);
    }

    public function getListTags()
    {
        return ArrayHelper::map(ArticleTag::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }
}
