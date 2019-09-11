<?php

/** @var integer $id */
/** @var integer $amount */

use frontend\widgets\ResultRecipeWidget;

echo ResultRecipeWidget::widget([
    'id' => $id,
    'amount' => $amount
]);

?>