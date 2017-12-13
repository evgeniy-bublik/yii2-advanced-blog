<?php

namespace app\modules\portfolio\controllers;

use Yii;
use app\modules\portfolio\models\Category;
use app\modules\portfolio\models\searchModels\CategorySearch;
use yii\filters\VerbFilter;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use yii\filters\AccessControl;
use app\modules\core\components\BackendController;

class CategoriesController extends BackendController
{
    private $categoryClassName;

    public function init()
    {
        parent::init();

        $this->categoryClassName = Category::className();
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
                'searchModelName' => CategorySearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List portfolio categories',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->categoryClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View portfolio category',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->categoryClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->categoryClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create portfolio category',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->categoryClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update portfolio category',
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
            'display_order',
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
            'description',
            'display_order',
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
                'label' => 'Portfolio categories',
                'url' => ['index'],
            ],
            [
                'label' => 'List portfolio categories',
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
                'label' => 'Portfolio categories',
                'url' => ['index'],
            ],
            [
                'label' => 'View portfolio category',
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
                'label' => 'Portfolio categories',
                'url' => ['index'],
            ],
            [
                'label' => 'Create portfolio category',
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
                'label' => 'Portfolio categories',
                'url' => ['index'],
            ],
            [
                'label' => 'Update portfolio category',
            ]
        ];
    }
}
