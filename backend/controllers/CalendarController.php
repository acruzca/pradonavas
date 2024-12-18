<?php
namespace backend\controllers;

use yii\web\Controller;
use common\models\Reservation;
use yii\data\ActiveDataProvider;
use Yii;
use yii\helpers\Html;
use yii\swiftmailer\Mailer;
use mPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Summary of CalendarController
 */
class CalendarController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Reservation::find(),
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
        $model = new Reservation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Reserva creada exitosamente.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Summary of actionUpdate
     * @param mixed $id
     * @return string|Yii\web\Response
     */
    public function actionUpdate($id)
    {
        $model = Reservation::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Reserva actualizada.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Reservation::findOne($id);
        if ($model) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Reserva eliminada.');
        }

        return $this->redirect(['index']);
    }

    /**
     * Summary of actionAddGuest
     * @param mixed $reservation_id
     * @return string|Yii\web\Response
     */
    /*public function actionAddGuest($reservation_id)
    {
        $model = new Guest();
        $model->reservation_id = $reservation_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Huésped añadido correctamente.');
            return $this->redirect(['update', 'id' => $reservation_id]);
        }

        return $this->render('add-guest', [
            'model' => $model,
        ]);
    }*/

    /**
     * Summary of actionGenerateInvoice
     * @param mixed $id
     * @return Yii\web\Response
     */
    /*public function actionGenerateInvoice($id)
    {
        $reservation = Reservation::findOne($id);
        $invoice = new Invoice([
            'reservation_id' => $reservation->id,
            'total_amount' => $reservation->total_price,
            'invoice_number' => 'INV-' . time()
        ]);

        if ($invoice->save()) {
            Yii::$app->session->setFlash('success', 'Factura generada.');
            return $this->redirect(['index']);
        }
    }*/

    /**
     * Summary of actionGenerateReceipt
     * @param mixed $id
     * @return string|Yii\web\Response
     */
    /*public function actionGenerateReceipt($id)
    {
        $model = new Receipt(['reservation_id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Recibo generado.');
            return $this->redirect(['index']);
        }

        return $this->render('generate-receipt', ['model' => $model]);
    }*/

    /**
     * Summary of actionExportToSecurity
     * @param mixed $id
     * @return void
     */
    public function actionExportToSecurity($id)
    {
        $reservation = Reservation::findOne($id);
        $guests = $reservation->getGuests()->all();

        $data = [];
        foreach ($guests as $guest) {
            $data[] = [
                'name' => $guest->first_name . ' ' . $guest->last_name,
                'document' => $guest->document_number,
                'birth_date' => $guest->birth_date,
            ];
        }

        $file = 'reservation_' . $reservation->id . '_security.json';
        file_put_contents($file, json_encode($data));

        Yii::$app->response->sendFile($file);
    }

    /**
     * Summary of actionGenerateInvoice
     * @param mixed $id
     * @return string|Yii\web\Response
     */
    /*public function actionGenerateInvoice($id)
    {
        // Encontramos la reserva
        $reservation = Reservation::findOne($id);

        // Creamos una nueva factura
        $invoice = new Invoice([
            'reservation_id' => $reservation->id,
            'total_amount' => $reservation->total_price,
            'invoice_number' => 'INV-' . strtoupper(uniqid())
        ]);

        // Guardamos la factura y retornamos una respuesta
        if ($invoice->save()) {
            Yii::$app->session->setFlash('success', 'Factura generada exitosamente.');
            return $this->redirect(['reservation/view', 'id' => $reservation->id]);
        } else {
            Yii::$app->session->setFlash('error', 'Error al generar la factura.');
        }

        return $this->render('generate-invoice', ['invoice' => $invoice]);
    }*/

    /**
     * Summary of actionGenerateReceipt
     * @param mixed $id
     * @return string|Yii\web\Response
     */
    /*public function actionGenerateReceipt($id)
    {
        // Encontramos la reserva
        $reservation = Reservation::findOne($id);

        // Creamos un nuevo recibo
        $receipt = new Receipt();
        $receipt->reservation_id = $reservation->id;
        $receipt->amount_paid = $reservation->total_price; // Esto se debe calcular con los pagos realizados
        $receipt->payment_method = 'card';  // Este valor debe ser recogido en el formulario
        $receipt->payment_date = date('Y-m-d H:i:s');

        // Guardamos el recibo y retornamos una respuesta
        if ($receipt->save()) {
            Yii::$app->session->setFlash('success', 'Recibo generado exitosamente.');
            return $this->redirect(['reservation/view', 'id' => $reservation->id]);
        } else {
            Yii::$app->session->setFlash('error', 'Error al generar el recibo.');
        }

        return $this->render('generate-receipt', ['receipt' => $receipt]);
    }*/


    /**
     * Acción para descargar la factura como archivo PDF
     * @param mixed $id
     * @return mixed
     */
    /*public function actionDownloadInvoice($id)
    {
        $invoice = Invoice::findOne($id);

        if (!$invoice) {
            Yii::$app->session->setFlash('error', 'Factura no encontrada.');
            return $this->redirect(['index']);
        }

        $reservation = $invoice->reservation;
        $content = $this->renderPartial('invoice-pdf', [
            'invoice' => $invoice,
            'reservation' => $reservation,
        ]);

        // Usando mPDF para generar PDF
        $pdf = new \mPDF();
        $pdf->WriteHTML($content);
        $pdfOutput = $pdf->Output('Factura-' . $invoice->invoice_number . '.pdf', 'D');
        return $pdfOutput;
    }*/






    public function actionExportToExcel()
    {
        // Obtener los datos (por ejemplo, todas las reservas)
        $reservations = Reservation::find()->all();

        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Títulos de las columnas
        $sheet->setCellValue('A1', 'ID Reserva');
        $sheet->setCellValue('B1', 'Cliente');
        $sheet->setCellValue('C1', 'Fecha de Reserva');
        $sheet->setCellValue('D1', 'Total');
        $sheet->setCellValue('E1', 'Estado');

        // Rellenar los datos
        $row = 2;
        foreach ($reservations as $reservation) {
            $sheet->setCellValue('A' . $row, $reservation->id);
            $sheet->setCellValue('B' . $row, $reservation->user->username);
            $sheet->setCellValue('C' . $row, Yii::$app->formatter->asDatetime($reservation->created_at, 'php:d/m/Y'));
            $sheet->setCellValue('D' . $row, $reservation->total_price);
            $sheet->setCellValue('E' . $row, $reservation->status);
            $row++;
        }

        // Crear un escritor de Excel
        $writer = new Xlsx($spreadsheet);

        // Definir nombre de archivo
        $filename = 'reservas_' . time() . '.xlsx';

        // Descargar el archivo
        Yii::$app->response->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        Yii::$app->response->setHeader('Content-Disposition', 'attachment;filename="' . $filename . '"');
        Yii::$app->response->sendHeaders();

        // Generar el archivo y enviarlo al navegador
        $writer->save('php://output');
        exit;
    }



}
