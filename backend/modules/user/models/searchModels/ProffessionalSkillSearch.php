<?php

namespace app\modules\user\models\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\ProffessionalSkill;

/**
 * ProffessionalSkillSearch represents the model behind the search form about `app\modules\user\models\ProffessionalSkill`.
 */
class ProffessionalSkillSearch extends ProffessionalSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'display_order', 'active'], 'integer'],
            [['name', 'value', 'color_bar'], 'safe'],
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
        $query = ProffessionalSkill::find();

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
            'display_order' => $this->display_order,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'color_bar', $this->color_bar]);

        return $dataProvider;
    }
}
