<?php


namespace frontend\widgets;


use common\essences\Item;
use common\essences\Recipe;
use common\essences\RecipeResult;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class RecipeList extends Widget
{
    public $id;

    /** @var Item */
    private $record;

    public function run()
    {
        $this->record = Item::findOne($this->id);
        $result = '';
        /** @var RecipeResult $recipeResult */
        foreach ($this->record->recipeResults as $recipeResult) {
            $recipes = $recipeResult->recipes;
            $recipe = array_map(function(Recipe $recipe) {
                return $recipe->item->name . ' x' . $recipe->amount  . Html::tag('br');
            }, $recipes);
            $result .= Html::tag('table',
                Html::tag('th',
                    Html::tag('td',
                        $recipeResult->getFullName()
                    ) .
                    Html::tag('td',
                        implode('<br/>', $recipe)
                    ) .
                    Html::tag('td',
                        Html::a('Перейти', Url::to('/recipe/'.$recipeResult->id))
                    )
                ),
                    [
                        'style' => 'background-color: lightgrey;'
                    ]
            ) . Html::tag('br');
        }

        return $result;
    }

}