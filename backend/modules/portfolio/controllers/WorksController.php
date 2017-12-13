<?php

namespace app\modules\portfolio\controllers;

use Yii;
use app\modules\portfolio\models\Work;
use app\modules\portfolio\models\searchModels\WorkSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;
use yii\web\Response;

class WorksController extends BackendController
{
    private $workClassName;

    public function init()
    {
        parent::init();

        $this->workClassName = Work::className();
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
     */
    public function actions()
    {
        return [
            'index' => [
                'class'           => CrudIndexAction::className(),
                'searchModelName' => WorkSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List works',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->workClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View work',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->workClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->workClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create work',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->workClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update work',
                'template'    => $this->getTemplateUpdateCrud(),
            ],
        ];
    }

    /**
     * Delete work image
     *
     * @param integer Id primary key work model
     *
     * @return array
     */
    public function actionDeleteImage($id)
    {
        $model = Work::findOne($id);

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
            'name',
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
            'name',
            'alias',
            'description',
            'date',
            'active',
            'meta_title',
            'meta_keywords',
            'meta_description',
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
                'label' => 'Portfolio works',
                'url' => ['index'],
            ],
            [
                'label' => 'List works',
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
                'label' => 'Portfolio works',
                'url' => ['index'],
            ],
            [
                'label' => 'View work',
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
                'label' => 'Portfolio works',
                'url' => ['index'],
            ],
            [
                'label' => 'Create work',
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
                'label' => 'Portfolio works',
                'url' => ['index'],
            ],
            [
                'label' => 'Update work',
            ]
        ];
    }
}
