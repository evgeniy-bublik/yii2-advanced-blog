<?php

namespace app\modules\article\controllers;

use Yii;
use app\modules\article\models\ArticleCategory;
use app\modules\article\models\searchModels\ArticleCategorySearch;
use yii\filters\VerbFilter;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use yii\filters\AccessControl;
use app\modules\core\components\BackendController;

/**
 * ArticleCategoriesController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoriesController extends BackendController
{
    //public $layout = '//form';

    private $articleCategoryClassName;

    public function init()
    {
        parent::init();

        $this->articleCategoryClassName = ArticleCategory::className();
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
                'searchModelName' => ArticleCategorySearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List article categories',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->articleCategoryClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View article category',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->articleCategoryClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->articleCategoryClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create article category',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->articleCategoryClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update article category',
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
            'parent_id',
            'title',
            'alias',
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
            'title',
            'parent_id',
            'alias',
            'description',
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
                'label' => 'Article categories',
                'url' => ['index'],
            ],
            [
                'label' => 'List article categories',
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
                'label' => 'Article categories',
                'url' => ['index'],
            ],
            [
                'label' => 'View article category',
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
                'label' => 'Article categories',
                'url' => ['index'],
            ],
            [
                'label' => 'Create article category',
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
                'label' => 'Article categories',
                'url' => ['index'],
            ],
            [
                'label' => 'Update article category',
            ]
        ];
    }
}
