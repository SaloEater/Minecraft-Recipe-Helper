<?php

use common\helpers\ListHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_id')->listBox(ListHelper::findItemsList()) ?>

    <?= $form->field($model, 'recipe_result_id')->listBox(ListHelper::findRecipeResultList()) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
