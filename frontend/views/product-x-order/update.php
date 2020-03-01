<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $productXOrder frontend\models\ProductXOrderModel */

$this->title = 'Update Product X Order Model: ' . $productXOrder->id_product_x_order;
$this->params['breadcrumbs'][] = ['label' => 'Product X Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $productXOrder->id_product_x_order, 'url' => ['view', 'id' => $productXOrder->id_product_x_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-xorder-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'productXOrder' => $productXOrder,
    ]) ?>

</div>
