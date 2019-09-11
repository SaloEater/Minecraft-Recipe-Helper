<?php


namespace frontend\controllers;


use yii\web\Controller;

class RecipeController extends Controller
{
    public function actionView($id, $amount = 1)
    {
        return $this->render('view', [
            'id' => $id,
            'amount' => $amount
        ]);
    }
}