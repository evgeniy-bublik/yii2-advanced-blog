<?php

namespace app\modules\core\controllers;

use Yii;
use app\modules\core\models\SocialLink;
use app\modules\core\models\searchModels\SocialLinkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\actions\CrudIndexAction;
use app\modules\core\actions\CrudViewAction;
use app\modules\core\actions\CrudDeleteAction;
use app\modules\core\actions\CrudCreateAction;
use app\modules\core\actions\CrudUpdateAction;
use app\modules\core\components\BackendController;

/**
 * SocialLinksController implements the CRUD actions for SocialLink model.
 */
class SocialLinksController extends BackendController
{
    private $socialLinkClassName;

    public function init()
    {
        parent::init();

        $this->socialLinkClassName = SocialLink::className();
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
                'searchModelName' => SocialLinkSearch::className(),
                'gridColumns'     => $this->getGridIndexColumns(),
                'breadcrumbs'     => $this->getIndexBreadcrumbs(),
                'title'           => 'List social links',
            ],
            'view' => [
                'class'                 => CrudViewAction::className(),
                'modelName'             => $this->socialLinkClassName,
                'detailViewAttributes'  => $this->getDetailViewsAttributes(),
                'breadcrumbs'           => $this->getViewBreadcrumbs(),
                'title'                 => 'View social link',
            ],
            'delete' => [
                'class'     => CrudDeleteAction::className(),
                'modelName' => $this->socialLinkClassName,
            ],
            'create' => [
                'class'       => CrudCreateAction::className(),
                'modelName'   => $this->socialLinkClassName,
                'breadcrumbs' => $this->getCreateBreadcrumbs(),
                'title'       => 'Create social link',
            ],
            'update' => [
                'class'       => CrudUpdateAction::className(),
                'modelName'   => $this->socialLinkClassName,
                'breadcrumbs' => $this->getUpdateBreadcrumbs(),
                'title'       => 'Update social link',
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
            'href',
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
            'link_class',
            'href',
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
                'label' => 'Social links',
                'url' => ['index'],
            ],
            [
                'label' => 'List social links',
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
                'label' => 'Social links',
                'url' => ['index'],
            ],
            [
                'label' => 'View social link',
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
                'label' => 'Social links',
                'url' => ['index'],
            ],
            [
                'label' => 'Create social link',
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
                'label' => 'Social links',
                'url' => ['index'],
            ],
            [
                'label' => 'Update social link',
            ]
        ];
    }
}