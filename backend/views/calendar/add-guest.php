<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Añadir Huésped';
?>

<div class="guest-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'document_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birth_date')->input('date') ?>
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->input('email') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>