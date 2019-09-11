<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\RecipeResult */

$this->title = 'Update Recipe Result: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipe Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipe-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
