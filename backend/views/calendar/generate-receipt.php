<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $receipt common\models\Receipt */
$this->title = 'Generar Recibo';
?>

<div class="receipt-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($receipt, 'amount_paid')->textInput(['type' => 'number', 'min' => 0, 'step' => 'any', 'value' => $receipt->amount_paid]) ?>
    <?= $form->field($receipt, 'payment_method')->dropDownList([
        'cash' => 'Efectivo',
        'card' => 'Tarjeta',
        'transfer' => 'Transferencia',
    ]) ?>
    <?= $form->field($receipt, 'payment_date')->input('datetime-local') ?>

    <div class="form-group">
        <?= Html::submitButton('Generar Recibo', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>