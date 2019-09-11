<?php

use common\essences\Item;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use function foo\func;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="recipe-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'label' => 'Ссылка',
                'value' => function(Item $item) {
                    return Html::a('Перейти', Url::toRoute('item/'.$item->id));
                },
                'format' => 'raw'
            ]
        ],
    ]); ?>


</div>
