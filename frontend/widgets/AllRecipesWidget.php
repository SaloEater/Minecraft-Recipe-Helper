<?php

namespace frontend\widgets;

use common\essences\RecipeResult;
use yii\base\Widget;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;

class AllRecipesWidget extends Widget
{
    public function run()
    {
        $gridView = GridView::widget([
            'dataProvider' => (new ArrayDataProvider())->setModels(RecipeResult::find()->all()),
            'columns' => [
                'name',
                [
                    'label' => 'Ссылка',
                    'value' => function (RecipeResult $recipeResult) {
                        return Url::to('/'.$recipeResult->id);
                    }
                ]
            ]
        ]);

        return $gridView;
    }
}