<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Reservation;
use yii\filters\AccessControl;
use Yii;

class ReservationController extends Controller
{
    public function actionCreate($apartmentId)
    {
        $model = new Reservation();
        $model->apartment_id = $apartmentId;
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Reserva realizada con éxito.');
            return $this->redirect(['apartment/index']);
        }

        return $this->render('create', ['model' => $model]);
    }
}
