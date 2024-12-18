<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Control de Gastos';
?>
<div class="expense-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Añadir Gasto', ['create'], ['class' => 'btn btn-success']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'category',
            'amount',
            'description:ntext',
            'expense_date:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>