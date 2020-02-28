<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientModel */

$this->title = 'Update Client Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_client]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateForm', [
        'model' => $model,
        'addresses' => $address
    ]) ?>

</div>
