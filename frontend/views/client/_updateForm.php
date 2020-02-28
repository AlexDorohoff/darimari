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

    <?php foreach ($addresses as $address) { ?>
        <div class="panel panel-default">
            <p class="list-group-item"><?= Html::a($address->city->name, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></a></p>
            <p class="list-group-item"><?= Html::a($address->street, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></p>
            <p class="list-group-item"><?= Html::a($address->house, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></p>
        </div>
    <?php } ?>

    <div class="panel panel-default">
        <p class="list-group-item"><?= Html::a('Добавить адресс', ['address/create', 'id_client' => $model['id_client']], ['class' => 'profile-link']) ?></a></p>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
