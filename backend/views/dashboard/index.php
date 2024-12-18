<?php
use yii\helpers\Html;
use yii\bootstrap5\Modal;


$title = 'Dashboard';
?>

<div class="dashboard">

    <h1><?= Html::encode($title) ?></h1>

    <div class="row">
        <!-- Total de Reservas -->
        <div class="col-md-3">
            <?= Modal::widget([
                'header' => 'Total de Reservas',
                'body' => '<h3>' . $totalReservations . '</h3>',
            ]) ?>
        </div>

        <!-- Total de Ingresos -->
        <div class="col-md-3">
            <?= Modal::widget([
                'header' => 'Total de Ingresos',
                'body' => '<h3>' . Yii::$app->formatter->asCurrency($totalIncome) . '</h3>',
            ]) ?>
        </div>

        <!-- Ocupación de Apartamentos -->
        <div class="col-md-3">
            <?= Modal::widget([
                'header' => 'Ocupación de Apartamentos',
                'body' => '<h3>' . round($occupancyRate, 2) . '%</h3>',
            ]) ?>
        </div>

        <!-- Beneficio Neto -->
        <div class="col-md-3">
            <?= Modal::widget([
                'header' => 'Beneficio Neto',
                'body' => '<h3>' . Yii::$app->formatter->asCurrency($netProfit) . '</h3>',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <!-- Gráfico de Ingresos por Mes -->
        <div class="col-md-12">
            <canvas id="incomeChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('incomeChart').getContext('2d');
        var incomeData = <?php echo json_encode($incomeByMonth); ?>;

        var labels = incomeData.map(function (item) {
            return 'Mes ' + item.month;
        });

        var data = incomeData.map(function (item) {
            return item.total_income;
        });

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ingresos por Mes',
                    data: data,
                    borderColor: '#FF5733',
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>