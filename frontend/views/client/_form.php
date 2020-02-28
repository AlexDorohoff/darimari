<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClientModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($address, 'id_city')->label('Город')->dropDownList($address->getCitiesList(), [
        'id_city' => 'id_city',
        'prompt' => '-Выберите город-',
    ]);?>

    <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($address, 'flat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
