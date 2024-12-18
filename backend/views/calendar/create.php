<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $model->isNewRecord ? 'Crear Reserva' : 'Actualizar Reserva';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="reservation-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apartment_id')->textInput() ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'start_date')->input('date') ?>
    <?= $form->field($model, 'end_date')->input('date') ?>
    <?= $form->field($model, 'total_price')->input('number') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
