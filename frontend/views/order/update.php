<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $order frontend\models\OrderModel */
/* @var $productXOrder frontend\models\ProductXOrderModel */

$this->title = 'Update Order Model: ' . $order->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $order->id_order, 'url' => ['view', 'id' => $order->id_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $order->id_order], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($order, 'id_client')->label(false)->hiddenInput(['value' => $id_client]); ?>

    <?php if (empty($id_client)) { ?>
        <?= $form->field($order, 'id_client')->label('Клиент')->dropDownList($order->getClientsList(), [
            'id_client' => 'id_client',
            'prompt' => '-Выберите клиента-',
        ]); ?>
        <div class="panel panel-default">
            <p class="list-group-item"><?= Html::a('Добавить клиента', ['client/create', ['class' => 'profile-link']]) ?></a></p>
        </div>
    <?php } ?>

    <?= $form->field($order, 'date')->textInput() ?>

    <?= $form->field($order, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($order, 'status')->textInput() ?>

    <div class="btn btn-default"><?= Html::a('Добавить продукт', ['product-x-order/create', 'id_order' => $order['id_order']], ['class' => 'profile-link']) ?></div>

    <?php
    foreach ($productXOrder as $product) { ?>
        <div class='panel'>
            <?= $product->product->name; ?>
            <?= $product->productXOrder->amount; ?>
            <?= Html::a('Delete', ['product-x-order/delete', 'id' => $product->productXOrder->id_product_x_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Update', ['product-x-order/update', 'id' => $product->productXOrder->id_product_x_order], ['class' => 'btn btn-primary']) ?>
        </div>
    <?php }
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
