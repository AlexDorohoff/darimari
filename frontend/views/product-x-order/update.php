<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductXOrderModel */

$this->title = 'Update Product X Order Model: ' . $model->id_product_x_order;
$this->params['breadcrumbs'][] = ['label' => 'Product X Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_product_x_order, 'url' => ['view', 'id' => $model->id_product_x_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-xorder-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
