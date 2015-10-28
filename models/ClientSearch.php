<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['username', 'company_name', 'contact_name', 'your_task', 'country', 'city', 'address', 'email', 'website', 'text', 'password', 'created', 'passwordText'], 'safe'],
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
        $query = Client::find();

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
            'is_active' => $this->is_active,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'your_task', $this->your_task])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'passwordText', $this->passwordText]);

        return $dataProvider;
    }
}
