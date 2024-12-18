<?php
/* @var $this yii\web\View */
/* @var $apartments common\models\Apartment[] */

foreach ($apartments as $apartment): ?>
    <div>
        <h3><?= $apartment->title ?></h3>
        <p><?= $apartment->description ?></p>
        <p>Precio por noche: $<?= $apartment->price ?></p>
        <a href="<?= yii\helpers\Url::to(['apartment/view', 'id' => $apartment->id]) ?>">Ver detalles</a>
    </div>
<?php endforeach; ?>