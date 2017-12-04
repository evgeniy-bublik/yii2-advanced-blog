<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\models\Setting;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\modules\core\components\BackendController;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;

/**
 * SettingsController implements the CRUD actions for Setting model.
 */
class SettingsController extends BackendController
{
    //public $layout = '//form';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionUpdate()
    {
        $settings = Setting::find()->all();

        $model = new DynamicModel(ArrayHelper::map($settings, 'key', 'value'));

        foreach (Setting::getRules() as $rule) {
            call_user_func_array([$model, 'addRule'], $rule);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            foreach ($settings as $setting) {
                if (!isset($model->{$setting->key})) {
                    continue;
                }

                $setting->value = $model->{$setting->key};

                $setting->save();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Get breadcrumbs which show in update page
     *
     * @return array
     */
    private function getUpdateBreadcrumbs()
    {
        return [
            [
                'label' => 'Update settings',
            ]
        ];
    }
}