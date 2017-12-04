<?php

namespace app\modules\core\controllers;

use yii\web\Controller;

class IconsController extends Controller
{
    public function actionColoredIcons()
    {
        return $this->render('colored-icons');
    }

    public function actionMaterialDesign()
    {
        return $this->render('material-design');
    }

    public function actionDripicons()
    {
        return $this->render('dripicons');
    }

    public function actionFontAwesome()
    {
        return $this->render('font-awesome');
    }

    public function actionFeatherIcons()
    {
        return $this->render('feather-icons');
    }

    public function actionSimpleLineIcons()
    {
        return $this->render('simple-line-icons');
    }

    public function actionFlagIcons()
    {
        return $this->render('flag-icons');
    }

    public function actionFileIcons()
    {
        return $this->render('file-icons');
    }

    public function actionPe7Icons()
    {
        return $this->render('pe7-icons');
    }

    public function actionTypicons()
    {
        return $this->render('typicons');
    }

}