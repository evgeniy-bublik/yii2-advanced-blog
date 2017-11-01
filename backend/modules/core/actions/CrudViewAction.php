<?php

namespace app\modules\core\actions;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;
use yii\base\Action;

class CrudViewAction extends Action
{
    public $modelName;

    public $detailViewAttributes;

    public $title;

    public $primaryKey = 'id';

    public $deleteButtonOptions = [];

    public $updateButtonOptions = [];

    public $htmlUpdateButtonOptions = [];

    public $htmlDeleteButtonOptions = [];

    public $template = '<div><h1>{title}</h1><p>{updateButton}{deleteButton}</p>{widget}</div>';

    public $viewPath = '@app/modules/core/views/crud';

    public $breadcrumbs = null;

    public $widgetClass = '\yii\widgets\DetailView';

    public $userWidgetOptions = [];

    protected $defaultUpdateButtonOptions = [
        'title' => 'Update',
    ];

    protected $defaultDeleteButtonOptions = [
        'title' => 'Delete',
    ];

    protected $defaultHtmlUpdateButtonOptions = [
        'class' => 'btn btn-primary'
    ];

    protected $defaultHtmlDeleteButtonOptions = [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ];

    protected $primaryKeyValue;

    public function init()
    {
        if (empty($this->modelName)) {
            throw new InvalidConfigException("<modelName> can't be empty");
        }

        parent::init();

        $this->primaryKeyValue                        = Yii::$app->request->get($this->primaryKey);
        $this->defaultDeleteButtonOptions[ 'action' ] = ['delete', $this->primaryKey => $this->primaryKeyValue];
        $this->defaultUpdateButtonOptions[ 'action' ] = ['update', $this->primaryKey => $this->primaryKeyValue];
        $this->controller->viewPath                   = $this->viewPath;
        $this->controller->view->title                = $this->title;

        if (!empty($this->breadcrumbs)) {
            $this->controller->view->params[ 'breadcrumbs' ][] = $this->breadcrumbs;
        }

        if (empty($this->title)) {
            $this->title = 'View';
        }
    }

    public function run()
    {
        $model = call_user_func_array([$this->modelName, 'findOne'], [$this->primaryKeyValue]);

        if (!$model) {
            throw new NotFoundHttpException("Model with {$this->primaryKey} = {$this->primaryKeyValue} not found");
        }

        return $this->controller->render('crud-content', [
            'content' => $this->getContent($model),
        ]);
    }

    protected function renderUpdateButton()
    {
        $buttonHtmlOptions  = array_merge($this->defaultHtmlUpdateButtonOptions, $this->htmlUpdateButtonOptions);
        $buttonOptions      = array_merge($this->defaultUpdateButtonOptions, $this->updateButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    protected function renderDeleteButton()
    {
        $buttonHtmlOptions  = array_merge($this->defaultHtmlDeleteButtonOptions, $this->htmlDeleteButtonOptions);
        $buttonOptions      = array_merge($this->defaultDeleteButtonOptions, $this->deleteButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    protected function getContent($model)
    {
        $widgetOptions = [
        ];

        return strtr($this->template, [
            '{title}'         => $this->title,
            '{updateButton}'  => $this->renderUpdateButton(),
            '{deleteButton}'  => $this->renderDeleteButton(),
            '{widget}'        => call_user_func_array([$this->widgetClass, 'widget'], [
                [
                    'model'       => $model,
                    'attributes'  => $this->detailViewAttributes,
                ]
            ]),
        ]);
    }
}