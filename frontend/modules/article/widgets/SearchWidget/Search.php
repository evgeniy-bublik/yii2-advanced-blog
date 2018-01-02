<?php

namespace app\modules\article\widgets\SearchWidget;

use yii\base\Widget;
use app\modules\article\models\forms\SearchForm;

/**
 * Search widget to show search form
 */
class Search extends Widget
{
    /**
     * View search form
     *
     * @return mixed
     */
    public function run()
    {
        $model = new SearchForm();

        return $this->render('index', compact('model'));
    }
}