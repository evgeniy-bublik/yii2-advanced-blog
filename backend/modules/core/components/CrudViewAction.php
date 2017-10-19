<?php

namespace app\modules\core\components;

use Yii;
use yii\helpers\Html;

class CrudViewAction extends BaseCrudAction
{
    public $model;
    public $detailViewAttributes;
    public $deleteButtonOptions = [];
    public $updateButtonOptions = [];
    public $htmlUpdateButtonOptions = [];
    public $htmlDeleteButtonOptions = [];
    public $template = '<div><h1>{title}</h1><p>{updateButton}{deleteButton}</p>{widget}</div>';
    public $breadcrumbs       = null;

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

    public function init()
    {
        parent::init();

        $this->defaultDeleteButtonOptions[ 'action' ] = ['delete', $this->model->primaryKey];
        $this->defaultUpdateButtonOptions[ 'action' ] = ['update', $this->model->primaryKey];

        $this->controller->viewPath     = $this->viewPath;
        $this->controller->view->title  = $this->title;

        $this->controller->view->params[ 'breadcrumbs' ][] = (empty($this->breadcrumbs)) ? $this->title : $this->breadcrumbs;

        if (empty($this->title)) {
            $title = 'View';
        }
    }

    public function run()
    {
        return $this->controller->render('crud-content', [
            'content' => $this->getContent(),
        ]);
    }

    private function renderUpdateButton()
    {
        $buttonHtmlOptions  = array_merge($this->defaultHtmlUpdateButtonOptions, $this->htmlUpdateButtonOptions);
        $buttonOptions      = array_merge($this->defaultUpdateButtonOptions, $this->updateButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    private function renderDeleteButton()
    {
        $buttonHtmlOptions  = array_merge($this->defaultHtmlDeleteButtonOptions, $this->htmlDeleteButtonOptions);
        $buttonOptions      = array_merge($this->defaultDeleteButtonOptions, $this->deleteButtonOptions);

        return Html::a($buttonOptions[ 'title' ], $buttonOptions[ 'action' ], $buttonHtmlOptions);
    }

    private function getContent()
    {
        return strtr($this->template, [
            '{title}' => $this->title,
            '{updateButton}' => $this->renderUpdateButton(),
            '{deleteButton}' => $this->renderDeleteButton(),
            '{widget}' => call_user_func_array(['\yii\widgets\DetailView', 'widget'], [
                [
                    'model' => $this->model,
                    'attributes' => $this->detailViewAttributes,
                ]
            ]),
        ]);
    }
}