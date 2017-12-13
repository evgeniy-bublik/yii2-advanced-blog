<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\article\models\Article;
use app\modules\article\models\searchModels\ArticleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;

/**
 * ArticlesController implements the CRUD actions for Article model.
 */
class ArticlesController extends BackendController
{
    /**
     * @var string $articleClassName Article class name
     */
    private $articleClassName;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->articleClassName = Article::className();
    }

    /**
     * @inheritdoc
     *
     * @return array
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

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function actions()
    {
        return [
            'index' => [
                'class'           => CrudIndexAction::className(),
                'searchModelName' => ArticleSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List articles',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->articleClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View article',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->articleClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->articleClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create article',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->articleClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update article',
                'template'    => $this->getTemplateUpdateCrud(),
            ],
        ];
    }

    /**
     * Delete article preview
     *
     * @param integer Id primary key article model
     *
     * @return array
     */
    public function actionDeletePreview($id)
    {
        $model = Article::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("Model with id = {$id} not found");

        }

        $model->deleteImages();
        $model->updateAttributes(['image' => null]);

        Yii::$app->response->format = Response::FORMAT_JSON;

        return [];
    }

    /**
     * Get columns which be view in grid widget
     *
     * @return array
     */
    private function getGridIndexColumns()
    {
        return [
            $this->getGridSerialColumn(),
            'title',
            'alias',
            'image',
            $this->getGridColumnYesOrNow('active'),
            $this->getGridActions(),
        ];
    }

    /**
     * Get columns which be view in detail view widget
     *
     * @return array
     */
    private function getDetailViewsAttributes()
    {
        return [
            'id',
            'user_id',
            'title',
            'alias',
            'small_description:text',
            'description:text',
            'date',
            'image',
            'display_order',
            'active',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get breadcrumbs which show in index page
     *
     * @return array
     */
    private function getIndexBreadcrumbs()
    {
        return [
            [
                'label' => 'Articles',
                'url' => ['index'],
            ],
            [
                'label' => 'List articles',
            ]
        ];
    }

    /**
     * Get breadcrumbs which show in view page
     *
     * @return array
     */
    private function getViewBreadcrumbs()
    {
        return [
            [
                'label' => 'Articles',
                'url' => ['index'],
            ],
            [
                'label' => 'View article',
            ]
        ];
    }

    /**
     * Get breadcrumbs which show in create page
     *
     * @return array
     */
    private function getCreateBreadcrumbs()
    {
        return [
            [
                'label' => 'Articles',
                'url' => ['index'],
            ],
            [
                'label' => 'Create article',
            ]
        ];
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
                'label' => 'Articles',
                'url' => ['index'],
            ],
            [
                'label' => 'Update article',
            ]
        ];
    }
}