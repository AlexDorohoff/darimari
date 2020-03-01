<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductXOrderModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-xorder-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_order')->label(false)->hiddenInput(['value' => $id_order]); ?>

    <?= $form->field($model, 'id_product')->label('Клиент')->dropDownList($model::getProductsList(), [
        'id_product' => 'id_product',
        'prompt' => '-Выберите продукт-',
    ]); ?>

    <?= $form->field($model, 'amount')->label('Количество'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
