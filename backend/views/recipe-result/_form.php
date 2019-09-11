<?php

use common\helpers\ListHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\essences\RecipeResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_id')->listBox(ListHelper::findItemsList()) ?>

    <?= $form->field($model, 'machine_id')->listBox(ListHelper::findMachineList()) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
