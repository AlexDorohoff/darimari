<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'City Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_city',
            'name',
            'comment:ntext',
            'id_region',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
