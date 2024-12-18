<?php
namespace common\models;

use yii\db\ActiveRecord;
use Yii;

class FiscalSummary extends ActiveRecord
{
    public static function tableName()
    {
        return 'fiscal_summary';
    }

    // Método para obtener el resumen fiscal
    public static function getSummary($startDate, $endDate)
    {
        // Obtener reservas entre las fechas indicadas
        $reservations = Reservation::find()
            ->where(['between', 'created_at', $startDate, $endDate])
            ->all();

        // Obtener todos los gastos entre las fechas
        $expenses = Expense::find()
            ->where(['between', 'expense_date', $startDate, $endDate])
            ->all();

        // Calcular el total de ingresos y el total de gastos
        $totalIncome = 0;
        foreach ($reservations as $reservation) {
            $totalIncome += $reservation->total_price;
        }

        $totalExpenses = 0;
        foreach ($expenses as $expense) {
            $totalExpenses += $expense->amount;
        }

        // Calcular el beneficio neto
        $netProfit = $totalIncome - $totalExpenses;

        // Devolver los resultados como un arreglo
        return [
            'total_income' => $totalIncome,
            'total_expenses' => $totalExpenses,
            'net_profit' => $netProfit
        ];
    }
}
