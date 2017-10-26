<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\article\models\Article;
use app\modules\article\models\searchModels\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    private $articleClassName;

    public function init()
    {
        parent::init();

        $this->articleClassName = Article::className();
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'index' => [
                'class'           => CrudIndexAction::className(),
                'searchModelName' => ArticleSearch::className(),
                'columnsGridView' => $this->getColumns(),
            ],
            'view' => [
                'class' => CrudViewAction::className(),
                'modelName' => $this->articleClassName,
            ],
            'delete' => [
                'class' => CrudDeleteAction::className(),
                'modelName' => $this->articleClassName,
            ],
        ];
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model          = new Article();
        $model->user_id = Yii::$app->user->identity->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletePreview($id)
    {
        $model = $this->findModel($id);

        $model->deleteImages();
        $model->updateAttributes(['image' => null]);

        Yii::$app->response->format = Response::FORMAT_JSON;

        return [];


    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null && empty($model->deleted_at)) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getColumns()
    {
        return [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'alias',
            'image',
            'active',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
            ],
        ];
    }
}
