<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderModel */

$this->title = $model->comment;
$this->params['breadcrumbs'][] = ['label' => 'Order Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Update', ['update', 'id' => $model->id_order, 'client_id' => $model->id_client], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id_order], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>
<?php ?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'date',
        'comment',
        'status',
    ],
]) ?>

<?php
foreach ($products as $product) {
    ?>
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
    <?php
}
?>


