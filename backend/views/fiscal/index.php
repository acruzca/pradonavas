<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$title = 'Generar Resumen Fiscal';
?>

<div class="fiscal-summary">

    <h1><?= Html::encode($title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'startDate')->input('date') ?>
    <?= $form->field($model, 'endDate')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Generar Resumen Fiscal', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>