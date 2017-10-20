<?php

namespace app\modules\core\models\searchModels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\core\models\Setting;

/**
 * SettingSearch represents the model behind the search form about `app\modules\core\models\Setting`.
 */
class SettingSearch extends Setting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'smtp_port'], 'integer'],
            [['admin_email', 'support_email', 'admin_phone', 'admin_address', 'smtp_username', 'smtp_password', 'smtp_host', 'smtp_encryption'], 'safe'],
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
        $query = Setting::find();

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
            'smtp_port' => $this->smtp_port,
        ]);

        $query->andFilterWhere(['like', 'admin_email', $this->admin_email])
            ->andFilterWhere(['like', 'support_email', $this->support_email])
            ->andFilterWhere(['like', 'admin_phone', $this->admin_phone])
            ->andFilterWhere(['like', 'admin_address', $this->admin_address])
            ->andFilterWhere(['like', 'smtp_username', $this->smtp_username])
            ->andFilterWhere(['like', 'smtp_password', $this->smtp_password])
            ->andFilterWhere(['like', 'smtp_host', $this->smtp_host])
            ->andFilterWhere(['like', 'smtp_encryption', $this->smtp_encryption]);

        return $dataProvider;
    }
}
