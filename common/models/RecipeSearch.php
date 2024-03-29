<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\essences\Recipe;

/**
 * RecipeSearch represents the model behind the search form of `common\essences\Recipe`.
 */
class RecipeSearch extends Recipe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'recipe_result_id', 'amount'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Recipe::find();

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
            'item_id' => $this->item_id,
            'recipe_result_id' => $this->recipe_result_id,
            'amount' => $this->amount,
        ]);

        return $dataProvider;
    }
}
