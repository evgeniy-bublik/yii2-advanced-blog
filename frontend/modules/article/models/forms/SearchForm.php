<?php

namespace app\modules\article\models\forms;

use yii\base\Model;
use app\modules\article\models\Article;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use app\modules\core\widgets\SettingWidget;

class SearchForm extends Model
{
    /**
     * @var string $search Search string
     */
    public $search;

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['search'], 'string'],
            [['search'], 'filter', 'filter' => 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'search' => 'Поиск',
        ];
    }

    /**
     * Search articles
     *
     * @return null|\yii\data\ActiveDataProvider
     */
    public function search()
    {
        if (empty($this->search)) {
            return null;
        }

        $query = Article::find()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', date('Y-m-d H:i:s')])
            ->andWhere([
                'or',
                ['like', 'title', $this->search],
                ['like', 'small_description', $this->search],
                ['like', 'description', $this->search],
            ]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => SettingWidget::widget(['key' => 'posts_on_page']),
            ],
        ]);
    }
}