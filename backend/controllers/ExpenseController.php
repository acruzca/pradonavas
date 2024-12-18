<?php
namespace backend\controllers;

use Yii;
use common\models\Expense;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * Summary of ExpenseController
 */
class ExpenseController extends Controller
{
    /**
     * Summary of actionIndex
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Expense::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Summary of actionCreate
     * @return string|Yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Expense();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Gasto registrado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Summary of actionUpdate
     * @param mixed $id
     * @return string|Yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = Expense::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Gasto actualizado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Summary of actionDelete
     * @param mixed $id
     * @return Yii\web\Response
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Gasto eliminado correctamente.');
        return $this->redirect(['index']);
    }

    /**
     * 
     */
    protected function findModel($id)
    {
        if (($model = Expense::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}