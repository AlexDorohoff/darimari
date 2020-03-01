<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $productXOrder frontend\models\ProductXOrderModel */
/* @var $id_order integer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-xorder-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if (!empty($id_order)) { ?>
        <?= $form->field($productXOrder, 'id_order')->label(false)->hiddenInput(['value' => $id_order]); ?>
    <?php } else { ?> <?= $form->field($productXOrder, 'id_order')->label(false)->hiddenInput(['value' => $productXOrder->id_product_x_order]);
    } ?>
    <?= $form->field($productXOrder, 'id_product')->label('Клиент')->dropDownList($productXOrder::getProductsList(), [
        'id_product' => 'id_product',
        'prompt' => '-Выберите продукт-',
    ]); ?>

    <?php
    if (!empty($productXOrder->amount)) { ?>

        <?= $form->field($productXOrder, 'amount')->label('количество')->Input($productXOrder->amount); ?>

    <?php } else { ?>

        <?= $form->field($productXOrder, 'amount')->label('Количество'); ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
