<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RegionModel */

$this->title = 'Update Region Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Region Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_region]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="region-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
