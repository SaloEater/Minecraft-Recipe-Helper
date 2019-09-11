<?php


namespace frontend\controllers;


use common\essences\Item;
use common\models\ItemSearch;
use common\models\ItemWithRecipeSearch;
use Yii;
use yii\web\Controller;

class ItemController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ItemWithRecipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {


        return $this->render('view', [
            'id' => $id
        ]);
    }
    
}