<?php
namespace backend\controllers;

use Yii;
use common\models\FiscalSummary;
use yii\web\Controller;
use yii\helpers\FileHelper;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FiscalController extends Controller
{
    /**
     * Summary of actionIndex
     * @return string
     */
    public function actionIndex()
    { // Mostrar la vista con un formulario paraelegir las fechas 
        return $this->render('index');
    }

    /**
     * *
     * @param mixed $startDate
     * @param mixed $endDate
     * @return never
     */
    public function actionGenerateSummary($startDate, $endDate)
    {
        // Obtener el resumen fiscal
        $summary = FiscalSummary::getSummary($startDate, $endDate);

        // Generar archivo Excel con los datos fiscales
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Establecer los títulos de las columnas
        $sheet->setCellValue('A1', 'Resumen Fiscal');
        $sheet->setCellValue('A2', 'Total Ingresos');
        $sheet->setCellValue('B2', $summary['total_income']);
        $sheet->setCellValue('A3', 'Total Gastos');
        $sheet->setCellValue('B3', $summary['total_expenses']);
        $sheet->setCellValue('A4', 'Beneficio Neto');
        $sheet->setCellValue('B4', $summary['net_profit']);

        // Generar archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Resumen_Fiscal_' . time() . '.xlsx';

        // Descargar el archivo
        Yii::$app->response->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        Yii::$app->response->setHeader('Content-Disposition', 'attachment;filename="' . $filename . '"');
        Yii::$app->response->sendHeaders();

        $writer->save('php://output');
        exit;
    }
}