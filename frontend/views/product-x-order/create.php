<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $productXOrder frontend\models\ProductXOrderModel */
/* @var $id_order integer */

$this->title = 'Create Product X Order Model';
$this->params['breadcrumbs'][] = ['label' => 'Product X Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-xorder-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'productXOrder' => $productXOrder,
        'id_order' => $id_order
    ]) ?>

</div>
