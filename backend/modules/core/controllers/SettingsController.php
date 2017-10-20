<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\models\Setting;
use yii\web\Controller;

/**
 * SettingsController implements the CRUD actions for Setting model.
 */
class SettingsController extends Controller
{
    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = Setting::find()->one();

        if (!$model) {
            $model = new Setting();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
}
