<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Reservation;
use common\models\Expense;
use common\models\Invoice;
use yii\data\Pagination;
class DashboardController extends Controller
{
    public function actionIndex()
    { // Total de Reservas $totalReservations=Reservation::find()->count();

        // Total de Ingresos
        $totalIncome = Reservation::find()->sum('total_price');

        // Total de Gastos
        $totalExpenses = Expense::find()->sum('amount');

        // Beneficio Neto
        $netProfit = $totalIncome - $totalExpenses;

        // Ocupación de los Apartamentos
        $totalApartments = \common\models\Apartment::find()->count();
        //$occupiedApartments = Reservation::find()->distinct('apartment_id')->count();
        //$occupancyRate = ($occupiedApartments / $totalApartments) * 100;

        // Pagos Realizados (recibos)
        $totalPayments = Invoice::find()->joinWith('receipts')->sum('amount_paid');

        // Datos para las gráficas
        $incomeByMonth = Reservation::find()
            ->select(['SUM(total_price) as total_income', 'MONTH(created_at) as month'])
            ->groupBy(['month'])
            ->orderBy(['month' => SORT_ASC])
            ->asArray()
            ->all();

        // Enviar los datos a la vista
        return $this->render('index', [
            //'totalReservations' => $totalReservations,
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netProfit' => $netProfit,
            //'occupancyRate' => $occupancyRate,
            'totalPayments' => $totalPayments,
            'incomeByMonth' => $incomeByMonth,
        ]);
    }
}