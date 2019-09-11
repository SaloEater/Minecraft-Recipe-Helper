<?php


namespace frontend\widgets;


use common\essences\Recipe;
use common\essences\RecipeResult;
use yii\base\Widget;
use yii\helpers\Html;

class RecipeWidget extends Widget
{
    /** @var Recipe */
    public $recipe;

    public $paddingLeft;

    public $amount;

    public function run()
    {
        $result = '';

        if (!$this->paddingLeft) {
            $this->paddingLeft = 0;
        }

        if (!$this->amount) {
            $this->amount = 1;
        }

        $result .= Html::tag('div', $this->recipe->getDescription($this->amount)) . '</br>';

        if ($recipeResults = RecipeResult::findAll(['item_id' => $this->recipe->item_id])) {
            foreach ($recipeResults as $recipeResult) {
                $result .= ResultRecipeWidget::widget([
                        'recipeResult' => $recipeResult,
                        'paddingLeft' => $this->paddingLeft + 5,
                        'amount' => $this->amount*$this->recipe->amount
                    ]) . '</br>';
            }
        }

        return Html::tag('div', $result,
            [
                'style' => 'padding-left:' . $this->paddingLeft . 'px;'
            ]);
    }
}