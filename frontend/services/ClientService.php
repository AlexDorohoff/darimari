<?php

namespace frontend\services;

use frontend\models\ClientModel;
use yii\data\ActiveDataProvider;

class ClientService
{
    public static function getAllClients()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ClientModel::find()->asArray(),
        ]);
        return $dataProvider->getModels();
    }
}