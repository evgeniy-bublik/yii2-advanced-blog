<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Work as BaseWork;
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

class Work extends BaseWork
{
    /**
     * @inheritdoc
     *
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['alias', 'unique'],
                ['alias', 'match', 'pattern' => '/^[a-z\d-]+[a-z\d]$/'],
                [['tags', 'categories'], 'safe'],
            ]
        );
    }

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function behaviors()
    {
        return  [
            'thumbBehavior' => [
                'class'         => ThumbBehavior::className(),
                'fileAttribute' => 'image', //атрибут модели для картинки
                'saveDir'       => 'files/portfolio/', //путь для сохранения картинок
                'thumbsSaveDir' => 'files/portfolio/thumbs/', // путь для сохранения превью картинок
                'previewSize'   => [
                    [370, 278],
                    [220, 224],
                ], //размеры генерируемых превью
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
            'relationBehaviors' => [
                'class' => \e96\behavior\RelationalBehavior::className(),
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
                    'name',
                    'alias',
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
                                'deleteUrl' => Url::toRoute(['/portfolio/works/delete-image', 'id' => $model->id]),
                            ],
                        ]);
                    },
                    'tags' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => Select2::classname(),
                        'widgetOptions' => [
                            'data' => Tag::hashListTags(),
                            'options' => [
                                'placeholder' => 'Select a tag ...',
                                'multiple' => true
                            ],
                        ],
                    ],
                    'categories' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => Select2::className(),
                        'widgetOptions' => [
                            'data' => Category::hashListCategories(),
                            'options' => [
                                'prompt' => 'Select category',
                                'placeholder' => 'Select category',
                                'allowClear' => true,
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
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
                                'name',
                                'alias',
                                'categories',
                                'description',
                                'date',
                                'image',
                                'tags',
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
    public function getLinksWorkToCategory()
    {
        return $this->hasMany(LinksWorkToCategory::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable(LinksWorkToCategory::tableName(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable(LinksWorkToTag::tableName(), ['work_id' => 'id']);
    }
}
