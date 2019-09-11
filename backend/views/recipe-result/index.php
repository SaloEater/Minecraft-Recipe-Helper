<?php

use common\essences\RecipeResult;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\grid\GridView;
use function foo\func;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RecipeResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recipe Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
            [
                'attribute' => 'item_id',
                'value' => 'item.name'
            ],
            'machine.name',
            'amount',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
