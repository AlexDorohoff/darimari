<?php

namespace frontend\models;

use Yii;
use frontend\models\OrderModel;
/**
 * This is the model class for table "client".
 *
 * @property int $id_client
 * @property string $name
 * @property string|null $last_name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $house
 * @property int|null $flat
 * @property int|null $id_region
 * @property int|null $id_city
 *
 * @property OrderModel[] $orders
 */
class ClientModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['address'], 'string'],
            [['flat', 'id_region', 'id_city'], 'integer'],
            [['name', 'last_name', 'city', 'house'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_client' => Yii::t('app', 'Id Client'),
            'name' => Yii::t('app', 'Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
            'house' => Yii::t('app', 'House'),
            'flat' => Yii::t('app', 'Flat'),
            'id_region' => Yii::t('app', 'Id Region'),
            'id_city' => Yii::t('app', 'Id City'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsOrders()
    {
        return $this->hasMany(OrderModel::className(), ['id_client' => 'id_client']);
    }
}
