<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $order frontend\models\OrderModel */

$this->title = 'Create Order Model';
$this->params['breadcrumbs'][] = ['label' => 'Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'order' => $order,
        'id_client' => $id_client,
        'productXOrder' => $productXOrder,
    ]) ?>

</div>
