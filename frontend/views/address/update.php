<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AddressModel */

$this->title = 'Update Address Model: ' . $model->id_address;
$this->params['breadcrumbs'][] = ['label' => 'Address Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_address, 'url' => ['view', 'id' => $model->id_address]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
