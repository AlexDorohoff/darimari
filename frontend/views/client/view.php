<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ClientModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_client], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_client], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'last_name',
        ],
    ]) ?>
    <div class="btn btn-default">
        <?= Html::a('Добавить адресс', ['address/create', 'id_client' => $model['id_client']], ['class' => 'profile-link']) ?>
    </div>
    <?php foreach ($addresses as $address) { ?>
        <div class="panel panel-default">
            <p class="list-group-item"><?= Html::a($address->city->name, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></a></p>
            <p class="list-group-item"><?= Html::a($address->street, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></p>
            <p class="list-group-item"><?= Html::a($address->house, ['address/view', 'id' => $address['id_address']], ['class' => 'profile-link']) ?></p>
        </div>
    <?php } ?>
</div>

<div class="btn btn-default"><?= Html::a('Добавить заказ', ['order/create', 'id_client' => $model['id_client']], ['class' => 'profile-link']) ?></div>


<?php foreach ($orders as $order) {
    ?>
    <div class="panel panel-default">
        <p class="list-group-item"><?= $order['comment'] ?></p>
        <p><?= Html::a($order['date'], ['order/view', 'id' => $order['id_order']], ['class' => 'profile-link']) ?></p>
    </div>

<?php } ?>
