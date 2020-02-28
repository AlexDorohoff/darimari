<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddressModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->label(false)->hiddenInput(['value' => $id_client]); ?>

    <?= $form->field($model, 'id_city')->label('Город')->dropDownList($model->getCitiesList(), [
        'id_city' => 'id_city',
        'prompt'=>'-Выберите город-',])?>

    <div class="panel panel-default">
        <p class="list-group-item"><?= Html::a('Добавить город', ['city/create', ['class' => 'profile-link']]) ?></a></p>
    </div>

    <?= $form->field($model, 'street')->textInput() ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'flat')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
