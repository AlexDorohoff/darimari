<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product X Order Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-xorder-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product X Order Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product_x_order',
            'id_product',
            'id_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
