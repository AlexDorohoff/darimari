<?php


namespace frontend\services;

use common\models\AddressModel;
use yii\data\ActiveDataProvider;

class AddressService
{
    public static function getAllClinetsAdresses($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AddressModel::find()->where(['id_client' => $id])->joinWith('city'),
        ]);
        $adresess = $dataProvider->getModels();
        return $adresess;
    }

    public static function getAddressesList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AddressModel::find()->joinWith('city'),
        ]);
        $adresses = $dataProvider->getModels();
        return $adresses;
    }
}