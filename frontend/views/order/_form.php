<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $order frontend\models\OrderModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-model-form">

    <?php $form = ActiveForm::begin(); ?>



    <?php if (empty($id_client)) { ?>
        <?= $form->field($order, 'id_client')->label('Клиент')->dropDownList($order->getClientsList(), [
            'id_client' => 'id_client',
            'prompt' => '-Выберите клиента-',
        ]); ?>
        <div class="panel panel-default">
            <p class="list-group-item"><?= Html::a('Добавить клиента', ['client/create', ['class' => 'profile-link']]) ?></a></p>
        </div>
    <?php } else { ?>
        <?= $form->field($order, 'id_client')->label(false)->hiddenInput(['value' => $id_client]); ?>
    <?php } ?>

    <?= $form->field($order, 'date')->textInput() ?>

    <?= $form->field($order, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($order, 'status')->textInput() ?>

    <?= $form->field($productXOrder, 'id_product')->label('Продукт')->dropDownList($productXOrder->getProductsList(), [
        'id_product' => 'id_product',
        'prompt' => '-Выберите продукт-',
    ]); ?>

    <?= $form->field($productXOrder, 'amount')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
