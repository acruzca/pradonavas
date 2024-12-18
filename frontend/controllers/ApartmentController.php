<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Apartment;

class ApartmentController extends Controller
{
    public function actionIndex()
    {
        $apartments = Apartment::find()->all();
        return $this->render('index', ['apartments' => $apartments]);
    }

    public function actionView($id)
    {
        $apartment = Apartment::findOne($id);
        return $this->render('view', ['apartment' => $apartment]);
    }
}
