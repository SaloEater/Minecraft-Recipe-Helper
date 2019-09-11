<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "machine".
 *
 * @property int $id
 * @property string $name
 *
 * @property RecipeResult[] $recipeResults
 */
class Machine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'machine';
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
    public function getRecipeResults()
    {
        return $this->hasMany(RecipeResult::className(), ['machine_id' => 'id']);
    }
}
