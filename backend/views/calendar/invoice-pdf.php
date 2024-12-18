<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-header { text-align: center; }
        .invoice-details { margin-top: 20px; }
        .invoice-details td { padding: 5px; }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Factura</h1>
        <p>Fecha de Emisión: <?= Yii::$app->formatter->asDatetime($invoice->issue_date, 'php:d/m/Y H:i') ?></p>
    </div>
    
    <div class="invoice-details">
        <table>
            <tr>
                <td><strong>Número de Factura:</strong></td>
                <td><?= $invoice->invoice_number ?></td>
            </tr>
            <tr>
                <td><strong>Reserva:</strong></td>
                <td>#<?= $reservation->id ?></td>
            </tr>
            <tr>
                <td><strong>Importe Total:</strong></td>
                <td><?= $invoice->total_amount ?> €</td>
            </tr>
            <tr>
                <td><strong>Cliente:</strong></td>
                <td><?= $reservation->user->username ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
