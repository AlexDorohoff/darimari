<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RegionModel */

$this->title = 'Create Region Model';
$this->params['breadcrumbs'][] = ['label' => 'Region Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
