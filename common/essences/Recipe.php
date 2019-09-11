<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property int $item_id
 * @property int $recipe_result_id
 * @property int $amount
 *
 * @property Item $item
 * @property RecipeResult $recipeResult
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'recipe_result_id', 'amount'], 'integer'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['recipe_result_id'], 'exist', 'skipOnError' => true, 'targetClass' => RecipeResult::className(), 'targetAttribute' => ['recipe_result_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'recipe_result_id' => 'Recipe Result ID',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeResult()
    {
        return $this->hasOne(RecipeResult::className(), ['id' => 'recipe_result_id']);
    }

    public function getDescription($amount = 1)
    {
        return $this->item->name . ' x' . $this->amount * $amount;
    }

}
