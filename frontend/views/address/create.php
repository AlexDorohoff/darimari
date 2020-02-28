<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AddressModel */

$this->title = 'Create Address Model';
$this->params['breadcrumbs'][] = ['label' => 'Address Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id_client' => $id_client,
    ]) ?>

</div>
