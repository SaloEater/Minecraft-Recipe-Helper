<?php

use common\essences\Recipe;
use common\essences\RecipeResult;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\essences\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

    <b>Результат крафта:</b>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
                'query' => RecipeResult::find()->where(['item_id' => $model->id])
        ]),
        'columns' => [
            [
                    'value' => function(RecipeResult $recipeResult) {
                        return Html::a($recipeResult->name, Url::to('/recipe-result/view?id='.$recipeResult->id));
                    },
                'format' => 'raw'
            ],
            'machine.name'
        ]
    ])?>

    <b>Ингредиент крафта:</b>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Recipe::find()->where(['item_id' => $model->id])
        ]),
        'columns' => [
            [
                'value' => function(Recipe $recipe) {
                    return Html::a($recipe->recipeResult->name, Url::to('/recipe-result/view?id='.$recipe->recipeResult->id));
                },
                'format' => 'raw'
            ],
            [
                'value' => function(Recipe $recipe) {
                    return Html::a($recipe->amount, Url::to('/recipe/view?id='.$recipe->id));
                },
                'format' => 'raw'
            ],
        ]
    ])?>

</div>
