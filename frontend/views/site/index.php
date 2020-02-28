<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Клиенты</h2>
                <p>
                    <?= Html::a('Create Client Model', ['client/create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php
                foreach ($clients as $client) {
                    if (!empty($client['name'])) {
                        ?>
                        <div class="panel panel-default">
                            <p class="list-group-item"><?= Html::a($client['name'], ['client/view', 'id' => $client['id_client']], ['class' => 'profile-link']) ?></p>
                        </div>
                    <?php }
                }
                ?>
            </div>
            <div class="col-lg-4">
                <h2>Заказы</h2>
                <p>
                    <?= Html::a('Create Order Model', ['order/create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php
                foreach ($orders as $order) {
                    if (!empty($order['comment'])) {
                        ?>
                        <div class="panel panel-default">
                            <p class="list-group-item"><?= Html::a($order['comment'], ['order/view', 'id' => $order['id_order']], ['class' => 'profile-link']) ?></a></p>
                        </div>
                    <?php }
                }
                ?>
            </div>
            <div class="col-lg-1">
                <div class="btn btn-default">
                    <a href="<?= Url::toRoute(['product/index']); ?>">Продукты</a>
                </div>
                </p>
            </div>
            <div class="col-lg-1">
                <div class="btn btn-default">
                    <a href="<?= Url::toRoute(['address/index']); ?>">Адреса</a>
                </div>
                </p>
            </div>
        </div>

    </div>
</div>
