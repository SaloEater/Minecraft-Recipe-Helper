<?php


namespace frontend\widgets;


use common\essences\Recipe;
use common\essences\RecipeResult;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\Controller;

class ResultRecipeWidget extends Widget
{
    public $id;

    public $recipeResult;

    public $paddingLeft;

    public $amount;

    public function run()
    {
        if (!$this->recipeResult) {
            /** @var RecipeResult $recipeResult */
            $this->recipeResult = RecipeResult::findOne($this->id);
        }

        if (!$this->paddingLeft) {
            $this->paddingLeft = 0;
        }

        if (!$this->amount) {
            $this->amount = 1;
        }

        $result = $this->recipeResult->name . '</br>';

        $result .= 'Машина: '.$this->recipeResult->machine->name . '</br>';

        /** @var Recipe $recipe */
        foreach ($this->recipeResult->recipes as $recipe) {
            $recipeHtml = RecipeWidget::widget([
                    'recipe' => $recipe,
                    'paddingLeft' => $this->paddingLeft + 5,
                    'amount' => $this->amount/$this->recipeResult->amount
                ]) . '</br>';
            $result .= 'Рецепт:</br>'.Html::tag('div', $recipeHtml, [
                'style' => 'border-style:solid;padding-left:' . $this->paddingLeft . 'px;'
            ]);
        }



        return Html::tag('div', $result, [
            'style' => 'border-style:solid;padding-left:' . $this->paddingLeft . 'px;'
        ]);
    }
}