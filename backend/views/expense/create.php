<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Añadir Gasto';
?>

<div class="expense-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'amount')->textInput(['type' => 'number', 'min' => 0, 'step' => 'any']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'expense_date')->input('datetime-local') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar Gasto', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>