<?php

namespace app\modules\core\components;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class BackendController extends Controller
{
    public function getGridColumnYesOrNow($attribute, $columnOptions = [], $withFilter = true)
    {
        $valueYes           = ArrayHelper::remove($columnOptions, 'valueYes', 'Yes');
        $valueNo            = ArrayHelper::remove($columnOptions, 'valueNo', 'No');
        $attributeValueYes  = ArrayHelper::remove($columnOptions, 'attributeValueYes', 1);
        $attributeValueNo   = ArrayHelper::remove($columnOptions, 'attributeValueNo', 0);

        ArrayHelper::setValue($columnOptions, 'attribute', $attribute);
        ArrayHelper::setValue($columnOptions, 'value', function($model) use ($valueYes, $valueNo, $attributeValueYes, $attribute) {
            return ($model->$attribute === $attributeValueYes) ? $valueYes : $valueNo;
        });

        if ($withFilter) {
            ArrayHelper::setValue($columnOptions, 'filter', [
                    $attributeValueYes  => $valueYes,
                    $attributeValueNo   => $valueNo,
                ]
            );
            ArrayHelper::setValue($columnOptions, 'filterInputOptions', [
                'class' => 'select',
            ]);
        }

        return $columnOptions;
    }

    public function getGridSerialColumn()
    {
        return ['class' => 'yii\grid\SerialColumn'];
    }

    protected function getActiveColumn($attribute = 'active', $withFilter = true)
    {

    }

    public function getGridActions($options = [])
    {
        return ArrayHelper::merge($options, [
            'class'   => 'yii\grid\ActionColumn',
            'header'  => 'Actions',
            'buttons' => [
                'update' => function($url, $model, $key) {
                    return Html::a(
                        Html::tag('i', '', [
                            'class' => 'fa fa-pencil fa-lg',
                        ]),
                        $url
                    ); },
                'delete' => function($url, $model, $key) {
                    return Html::a(
                        Html::tag('i', '', [
                          'class' => 'fa fa-trash fa-lg',
                        ]),
                        $url,
                        [
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Are you sure delete this item?',
                            ],
                        ]
                    ); },
                'view' => function($url, $model, $key) {
                    return Html::a(
                        Html::tag('i', '', [
                            'class' => 'fa fa-eye fa-lg',
                        ]),
                        $url
                    ); },
            ],
        ]);
    }

    protected function getTemplateIndexCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box"><p>{createButton}</p>{widget}</div><div></div>';
    }

    protected function getTemplateViewCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box"><p>{updateButton}{deleteButton}</p>{widget}</div></div></div>';
    }

    protected function getTemplateUpdateCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box">{form}</div></div></div>';
    }

    protected function getTemplateCreateCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box">{form}</div></div></div>';
    }

    protected function getDefaultGridViewWidgetOptions()
    {
        return [
            'summary' => false,
        ];
    }
}