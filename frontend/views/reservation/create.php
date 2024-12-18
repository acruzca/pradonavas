<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Hacer Reserva';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="reservation-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->input('date') ?>
    <?= $form->field($model, 'end_date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Reservar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>