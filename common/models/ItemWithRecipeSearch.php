<?php

namespace common\models;

use common\essences\RecipeResult;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\essences\Item;

/**
 * ItemSearch represents the model behind the search form of `common\essences\Item`.
 */
class ItemWithRecipeSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
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
        $query = Item::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        $query->innerJoin(RecipeResult::tableName(), 'item_id = item.id');

        $raw = $query->createCommand()->getRawSql();

        return $dataProvider;
    }
}