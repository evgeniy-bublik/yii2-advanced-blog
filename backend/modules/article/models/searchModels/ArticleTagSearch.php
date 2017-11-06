<?php

namespace app\modules\article\models\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\article\models\ArticleTag;

/**
 * ArticleTagSearch represents the model behind the search form about `app\modules\article\models\ArticleTag`.
 */
class ArticleTagSearch extends ArticleTag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'frequency', 'display_order', 'active'], 'integer'],
            [['name', 'alias', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleTag::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'frequency' => $this->frequency,
            'display_order' => $this->display_order,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'alias', $this->alias]);

        return $dataProvider;
    }
}
