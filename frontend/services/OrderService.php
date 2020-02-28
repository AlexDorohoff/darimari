<?php


namespace frontend\services;

use frontend\models\OrderModel;
use yii\data\ActiveDataProvider;

class OrderService
{
    public static function getAllOrders()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderModel::find()->asArray(),
        ]);
        return $dataProvider->getModels();
    }

    public static function getAllClientOrders($client_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderModel::find()->where(['id_client' => $client_id]),
        ]);
        $items = $dataProvider->getModels();
        return $items;
    }

}