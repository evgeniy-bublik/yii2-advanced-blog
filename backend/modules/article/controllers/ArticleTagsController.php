<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\article\models\ArticleTag;
use app\modules\article\models\searchModels\ArticleTagSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;

/**
 * ArticleTagsController implements the CRUD actions for ArticleTag model.
 */
class ArticleTagsController extends BackendController
{
    private $articleTagClassName;

    public function init()
    {
        parent::init();

        $this->articleTagClassName = ArticleTag::className();
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
                'searchModelName' => ArticleTagSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List article tags',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->articleTagClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View article tag',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->articleTagClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->articleTagClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create article tag',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->articleTagClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update article tag',
                'template'    => $this->getTemplateUpdateCrud(),
            ],
        ];
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
            'frequency',
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
            'frequency',
            'display_order',
            'active',
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
                'label' => 'Article tags',
                'url' => ['index'],
            ],
            [
                'label' => 'List tags',
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
                'label' => 'Article tags',
                'url' => ['index'],
            ],
            [
                'label' => 'View tag',
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
                'label' => 'Article tags',
                'url' => ['index'],
            ],
            [
                'label' => 'Create tag',
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
                'label' => 'Article tags',
                'url' => ['index'],
            ],
            [
                'label' => 'Update tag',
            ]
        ];
    }
}