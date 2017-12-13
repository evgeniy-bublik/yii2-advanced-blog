<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\models\TextBlock;
use app\modules\core\models\searchModels\TextBlockSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;
use yii\data\ActiveDataProvider;

/**
 * TextBlocksController implements the CRUD actions for TextBlock model.
 */
class TextBlocksController extends BackendController
{
    /** @var string Text block class name */
    private $textBlockClassName;

    /**
     * {@inheritdoc}
     *
     */
    public function init()
    {
        parent::init();

        $this->textBlockClassName = TextBlock::className();
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     *
     * @return array
     */
    public function actions()
    {
        return [
            'index' => [
                'class'           => CrudIndexAction::className(),
                'searchModelName' => TextBlockSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List text blocks',
                'template'        => $this->getTemplateIndexCrud(),
                'widgetOptions'   => $this->getDefaultGridViewWidgetOptions(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->textBlockClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View text block',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->textBlockClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->textBlockClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create text block',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->textBlockClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update text block',
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
            'code',
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
            'code',
            'description',
            'text',
            'active',
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
                'label' => 'Text blocks',
                'url' => ['index'],
            ],
            [
                'label' => 'List text blocks',
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
                'label' => 'Text blocks',
                'url' => ['index'],
            ],
            [
                'label' => 'View text block',
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
                'label' => 'Text blocks',
                'url' => ['index'],
            ],
            [
                'label' => 'Create text block',
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
                'label' => 'Text blocks',
                'url' => ['index'],
            ],
            [
                'label' => 'Update text block',
            ]
        ];
    }
}
