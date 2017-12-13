<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\models\CorePage;
use app\modules\core\models\searchModels\CorePageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;
use yii\filters\AccessControl;

/**
 * CorePagesController implements the CRUD actions for CorePage model.
 */
class CorePagesController extends BackendController
{
    private $corePageClassName;

    public function init()
    {
        parent::init();

        $this->corePageClassName = CorePage::className();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
                'searchModelName' => CorePageSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List core pages',
                'template'        => $this->getTemplateIndexCrud(),
                'widgetOptions'   => $this->getDefaultGridViewWidgetOptions(),
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->corePageClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View core page',
                'template'              => $this->getTemplateViewCrud(),
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->corePageClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update core page',
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
            $this->getGridColumnYesOrNow('active'),
            $this->getGridActions([
                'template' => '{update}{view}',
            ]),
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
            'route',
            'active',
            'meta_title',
            'meta_description',
            'meta_keywords',
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
                'label' => 'Core pages',
                'url' => ['index'],
            ],
            [
                'label' => 'List core pages',
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
                'label' => 'Core pages',
                'url' => ['index'],
            ],
            [
                'label' => 'View core page',
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
                'label' => 'Core pages',
                'url' => ['index'],
            ],
            [
                'label' => 'Update core page',
            ]
        ];
    }

    protected function getTemplateIndexCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box">{widget}</div><div></div>';
    }

    protected function getTemplateViewCrud()
    {
        return '<div class="row"><div class="col-md-12"><div class="card-box"><p>{updateButton}</p>{widget}</div></div></div>';
    }
}
