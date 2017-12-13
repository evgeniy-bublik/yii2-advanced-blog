<?php

namespace app\modules\user\controllers;

use Yii;
use app\modules\user\models\ProffessionalSkill;
use app\modules\user\models\searchModels\ProffessionalSkillSearch;
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
 * ProffessionalSkillsController implements the CRUD actions for ProffessionalSkill model.
 */
class ProffessionalSkillsController extends BackendController
{
    /** @var string Text block class name */
    private $proffessionalSkillClassName;

    /**
     * {@inheritdoc}
     *
     */
    public function init()
    {
        parent::init();

        $this->proffessionalSkillClassName = ProffessionalSkill::className();
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
                'searchModelName' => ProffessionalSkillSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List proffessional skills',
                'template'        => $this->getTemplateIndexCrud(),
                'widgetOptions'   => $this->getDefaultGridViewWidgetOptions(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->proffessionalSkillClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View proffessional skill',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->proffessionalSkillClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->proffessionalSkillClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create proffessional skill',
                'template'    => $this->getTemplateCreateCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->proffessionalSkillClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update proffessional skill',
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
            'value',
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
            'value',
            'color_bar',
            'display_order',
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
                'label' => 'Proffessional skills',
                'url' => ['index'],
            ],
            [
                'label' => 'List proffessional skills',
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
                'label' => 'Proffessional skills',
                'url' => ['index'],
            ],
            [
                'label' => 'View proffessional skill',
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
                'label' => 'Proffessional skills',
                'url' => ['index'],
            ],
            [
                'label' => 'Create proffessional skill',
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
                'label' => 'Proffessional skills',
                'url' => ['index'],
            ],
            [
                'label' => 'Update proffessional skill',
            ]
        ];
    }
}
