<?php

namespace app\modules\core\components;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

class BackendController extends Controller
{
    public function getGridColumnYesOrNow($attribute, $columnOptions = [], $withFilter = true)
    {
        $valueYes = ArrayHelper::remove($columnOptions, 'valueYes', 'Yes');
        $valueNo = ArrayHelper::remove($columnOptions, 'valueNo', 'No');
        $attributeValueYes = ArrayHelper::remove($columnOptions, 'attributeValueYes', 1);
        $attributeValueNo = ArrayHelper::remove($columnOptions, 'attributeValueNo', 0);

        ArrayHelper::setValue($columnOptions, 'attribute', $attribute);
        ArrayHelper::setValue($columnOptions, 'value', function($model) use ($valueYes, $valueNo, $attributeValueYes, $attribute) {
            return ($model->$attribute === $attributeValueYes) ? $valueYes : $valueNo;
        });

        if ($withFilter) {
            ArrayHelper::setValue($columnOptions, 'filter', [
                    $attributeValueYes => $valueYes,
                    $attributeValueNo => $valueNo,
                ]
            );
        }

        return $columnOptions;
    }

    public function getGridSerialColumn()
    {
        return ['class' => 'yii\grid\SerialColumn'];
    }

    public function getGridActions($options = [])
    {
        return ArrayHelper::merge($options, [
            'class'   => 'yii\grid\ActionColumn',
            'header'  => 'Actions',
        ]);
    }
}