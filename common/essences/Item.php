<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $name
 *
 * @property Recipe[] $recipes
 * @property RecipeResult[] $recipeResults
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeResults()
    {
        return $this->hasMany(RecipeResult::className(), ['item_id' => 'id']);
    }
}
