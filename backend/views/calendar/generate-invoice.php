<?php
use yii\helpers\Html;

/* @var $invoice common\models\Invoice */
$this->title = 'Factura Generada';
?>

<div class="invoice-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><strong>Número de Factura:</strong> <?= Html::encode($invoice->invoice_number) ?></p>
    <p><strong>Reserva:</strong> #<?= Html::encode($invoice->reservation_id) ?></p>
    <p><strong>Importe Total:</strong> <?= Html::encode($invoice->total_amount) ?> €</p>
    <p><strong>Fecha de Emisión:</strong> <?= Html::encode($invoice->issue_date) ?></p>

    <p>
        <?= Html::a('Descargar Factura PDF', ['download-invoice', 'id' => $invoice->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>