<?php

namespace app\modules\core\behaviors;

use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class FormBehavior extends Behavior
{
    const SIMPLE_FORM = 'simple';

    const TAB_FORM    = 'tab';

    const TEXT_INPUT_TYPE = 'textInput';

    const TEXTAREA_TYPE = 'textarea';

    const CHECKBOX_TYPE = 'checkbox';

    const DROPDOWNLIST_TYPE = 'dropDownList';

    const WIDGET_TYPE = 'widget';

    const INPUT_TYPE = 'input';

    const HIDDEN_INPUT_TYPE = 'hiddenInput';

    const FILE_INPUT_TYPE = 'fileInput';

    const PASSWORD_INPUT_TYPE = 'passwordInput';

    const RADIO_TYPE = 'radio';

    public $type = self::SIMPLE_FORM;

    public $formOptions = [
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ];

    public $submitButtonOptions;

    public $cancelButtonOptions;

    public $wrapperBlockButtonsOptions;

    public $template = '{items}{beginBlockButtons}{submitButton}{cancelButton}{endBlockButtons}';

    public $attributes;

    protected $form;

    private $allowedFormInputTypes;

    public function init()
    {
        parent::init();

        $this->allowedFormInputTypes = [
            static::TEXT_INPUT_TYPE     => static::TEXT_INPUT_TYPE,
            static::TEXTAREA_TYPE       => static::TEXTAREA_TYPE,
            static::CHECKBOX_TYPE       => static::CHECKBOX_TYPE,
            static::DROPDOWNLIST_TYPE   => static::DROPDOWNLIST_TYPE,
            static::WIDGET_TYPE         => static::WIDGET_TYPE,
            static::INPUT_TYPE          => static::INPUT_TYPE,
            static::HIDDEN_INPUT_TYPE   => static::HIDDEN_INPUT_TYPE,
            static::FILE_INPUT_TYPE     => static::FILE_INPUT_TYPE,
            static::PASSWORD_INPUT_TYPE => static::PASSWORD_INPUT_TYPE,
            static::RADIO_TYPE          => static::RADIO_TYPE,
        ];
    }

    public function getForm()
    {
        switch ($this->type) {
            case static::SIMPLE_FORM:
                return $this->getSimpleForm();
            case static::TAB_FORM:
                return $this->getTabForm();
            default:
                return $this->getSimpleForm();
        }
    }

    /**
     * Generate form fields for simple form
     *
     * @return string
     */
    protected function getSimpleForm()
    {
        if (!empty($this->form)) {
            return $this->form;
        }

        $model = $this->owner;
        $items = '';

        ob_start();

        $form = ActiveForm::begin($this->formOptions);

        foreach ($this->attributes as $attributeName => $options) {
            $field = null;

            if (!is_array($options)) {
                $attributeName  = $options;
                $options        = [];
            }

            $inputOptions     = ArrayHelper::getValue($options, 'inputOptions', []);
            $attributeOptions = ArrayHelper::getValue($options, 'attributeOptions', []);
            $type             = ArrayHelper::getValue($options, 'type', static::TEXT_INPUT_TYPE);
            $label            = ArrayHelper::getValue($options, 'label', null);
            $hint             = ArrayHelper::getValue($options, 'hint', null);

            if (!ArrayHelper::keyExists($type, $this->allowedFormInputTypes)) {
                $type = static::TEXT_INPUT_TYPE;
            }

            $field = $form->field($model, $attributeName, $attributeOptions);

            if ($type === static::WIDGET_TYPE) {
                $widgetClass = ArrayHelper::getValue($options, 'widgetClass', null);

                if (is_null($widgetClass)) {
                    throw new InvalidConfigException('For widget input type must be set option "widgetClass"');
                }

                $widgetOptions = ArrayHelper::getValue($options, 'widgetOptions', []);

                call_user_func_array([$field, $type], [$widgetClass, $widgetOptions]);
            } else {
                call_user_func_array([$field, $type], [$inputOptions]);
            }

            if ($label !== false && !is_null($label)) {
                $field->label($label);
            }

            if (!is_null($hint)) {
                $field->hint($hint);
            }

            $items .= $field;
        }

        echo strtr($this->template, [
            '{items}'             => $items,
            '{beginBlockButtons}' => $this->getBeginBlockButtons(),
            '{endBlockButtons}'   => $this->getEndBlockButtons(),
            '{submitButton}'      => $this->getSubmitButton(),
            '{cancelButton}'      => $this->getCancelButton(),
        ]);

        ActiveForm::end();

        $result = ob_get_contents();

        ob_get_clean();

        return $this->form = $result;
    }

    /**
     * Open wrapper buttons tag
     *
     * @return string
     */
    protected function getBeginBlockButtons()
    {
        $wrapperBlockButtonsOptions = $this->wrapperBlockButtonsOptions;

        $tag = ArrayHelper::getValue($wrapperBlockButtonsOptions, 'tag', 'div');

        ArrayHelper::remove($wrapperBlockButtonsOptions, 'tag');

        if ($tag === false) {
            return null;
        }

        if (!isset($wrapperBlockButtonsOptions[ 'class' ])) {
            Html::addCssClass($wrapperBlockButtonsOptions, 'form-group');
        }

        return Html::beginTag($tag, $wrapperBlockButtonsOptions);
    }

    /**
     * Close wrapper buttons tag
     *
     * @return string
     */
    protected function getEndBlockButtons()
    {
        $wrapperBlockButtonsOptions = $this->wrapperBlockButtonsOptions;

        $tag = ArrayHelper::getValue($wrapperBlockButtonsOptions, 'tag', 'div');

        if ($tag === false) {
            return null;
        }

        return Html::endTag($tag);
    }

    /**
     * Generate submit button form
     *
     * @return string
     */
    protected function getSubmitButton()
    {
        $submitButtonOptions  = $this->submitButtonOptions;
        $model                = $this->owner;

        $defaultCreateButtonOptions = [
            'title'       => 'Create',
            'tag'         => 'input',
            'htmlOptions' => [
                'class' => 'btn btn-success',
            ],
        ];

        $defaultUpdateButtonOptions = [
            'title'       => 'Update',
            'tag'         => 'input',
            'htmlOptions' => [
                'class' => 'btn btn-primary',
            ]
        ];

        $createButtonOptions = ArrayHelper::getValue($submitButtonOptions, 'createButtonOptions', []);
        $createButtonOptions = ArrayHelper::merge($defaultCreateButtonOptions, $createButtonOptions);

        $updateButtonOptions = ArrayHelper::getValue($submitButtonOptions, 'updateButtonOptions', []);
        $updateButtonOptions = ArrayHelper::merge($defaultUpdateButtonOptions, $updateButtonOptions);

        if ($model->isNewRecord) {
            $title        = ArrayHelper::getValue($createButtonOptions, 'title');
            $tag          = ArrayHelper::getValue($createButtonOptions, 'tag');
            $htmlOptions  = ArrayHelper::getValue($createButtonOptions, 'htmlOptions');
        } else {
            $title        = ArrayHelper::getValue($updateButtonOptions, 'title');
            $tag          = ArrayHelper::getValue($updateButtonOptions, 'tag');
            $htmlOptions  = ArrayHelper::getValue($updateButtonOptions, 'htmlOptions');
        }

        if ($tag === 'input') {
            return Html::submitInput($title, $htmlOptions);
        }

        return Html::submitButton($title, $htmlOptions);
    }

    /**
     * Generate cancel button form
     *
     * @return string
     */
    protected function getCancelButton()
    {
        $cancelButtonOptions = $this->cancelButtonOptions;

        if (!is_array($cancelButtonOptions)) {
            $cancelButtonOptions = [];
        }

        $defaultCancelButtonOptions = [
            'show'        => true,
            'title'       => 'Cancel',
            'action'      => ['index'],
            'htmlOptions' => [
                'class' => 'btn btn-default',
            ],
        ];

        if (ArrayHelper::getValue($cancelButtonOptions, 'show') === false) {
            return null;
        }

        $cancelButtonOptions = ArrayHelper::merge($defaultCancelButtonOptions, $cancelButtonOptions);

        $title        = ArrayHelper::getValue($cancelButtonOptions, 'title');
        $action       = ArrayHelper::getValue($cancelButtonOptions, 'action');
        $htmlOptions  = ArrayHelper::getValue($cancelButtonOptions, 'htmlOptions');

        return Html::a($title, $action, $htmlOptions);
    }
}