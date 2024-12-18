<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Calendario de Reservas';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Crear Reserva', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'apartment_id',
        'user_id',
        'start_date',
        'end_date',
        'total_price',
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Acciones',
            'template' => '{update} {delete}',
        ],
    ],
]); ?>