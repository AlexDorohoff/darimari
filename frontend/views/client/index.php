<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_client',
            'name',
            'last_name',
            'address:ntext',
            'city',
            //'house',
            //'flat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
