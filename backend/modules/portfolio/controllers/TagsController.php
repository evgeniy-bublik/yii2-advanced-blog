<?php

namespace app\modules\portfolio\controllers;

use Yii;
use app\modules\portfolio\models\Tag;
use app\modules\portfolio\models\searchModels\TagSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;

/**
 * TagsController implements the CRUD actions for Tag model.
 */
class TagsController extends BackendController
{

    private $tagClassName;

    public function init()
    {
        parent::init();

        $this->tagClassName = Tag::className();
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
                'searchModelName' => TagSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List portfolio tags',
                'template'        => $this->getTemplateIndexCrud(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->tagClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View portfolio tag',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->tagClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->tagClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create portfolio tag',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->tagClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update portfolio tag',
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
                'label' => 'Portfolio tags',
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
                'label' => 'Portfolio tags',
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
                'label' => 'Portfolio tags',
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
                'label' => 'Portfolio tags',
                'url' => ['index'],
            ],
            [
                'label' => 'Update tag',
            ]
        ];
    }
}
