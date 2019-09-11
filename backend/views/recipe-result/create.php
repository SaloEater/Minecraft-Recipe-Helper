<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\essences\RecipeResult */

$this->title = 'Create Recipe Result';
$this->params['breadcrumbs'][] = ['label' => 'Recipe Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
