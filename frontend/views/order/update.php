<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderModel */

$this->title = 'Update Order Model: ' . $model->id_order;
$this->params['breadcrumbs'][] = ['label' => 'Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_order, 'url' => ['view', 'id' => $model->id_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_order], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->label(false)->hiddenInput(['value' => $id_client]); ?>

    <?php if (empty($id_client)) { ?>
        <?= $form->field($model, 'id_client')->label('Клиент')->dropDownList($model->getClientsList(), [
            'id_client' => 'id_client',
            'prompt' => '-Выберите клиента-',
        ]); ?>
        <div class="panel panel-default">
            <p class="list-group-item"><?= Html::a('Добавить клиента', ['client/create', ['class' => 'profile-link']]) ?></a></p>
        </div>
    <?php } ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php
    foreach ($productXOrder as $product) { ?>
        <div class='panel'>
            <?= $product->product->name; ?>
            <?= $product->product_x_order->amount; ?>
            <?= Html::a('Delete', ['product-x-order/delete', 'id' => $product->product_x_order->id_product_x_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Update', ['update', 'id' => $product->product_x_order->id_product_x_order], ['class' => 'btn btn-primary']) ?>
        </div>
    <?php }
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
