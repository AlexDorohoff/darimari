<?php

namespace common\models;

use Faker\Provider\Address;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "address".
 *
 * @property int $id_address
 * @property int|null $id_client
 * @property int|null $id_city
 * @property int|null $house
 * @property int|null $flat
 * @property string|null $street
 * @property string|null $comment
 */
class AddressModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_city', 'house', 'flat'], 'integer'],
            [['comment', 'street'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_address' => Yii::t('app', 'Id Address'),
            'id_client' => Yii::t('app', 'Id Client'),
            'street' => Yii::t('app', 'Street'),
            'id_city' => Yii::t('app', 'Id City'),
            'house' => Yii::t('app', 'House'),
            'flat' => Yii::t('app', 'Flat'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    public static function getCitiesList()
    {
        $cities = CityModel::find()->all();
        $items = ArrayHelper::map($cities, 'id_city', 'name');
        return $items;
    }

    public static function getAddressesList()
    {
        $addresses = AddressModel::find()->With('city')->all();
        $items = ArrayHelper::map($addresses, 'id_city', 'street');
        return $items;
    }

    public function getCity()
    {
        return $this->hasOne(CityModel::className(), ['id_city' => 'id_city']);
    }
}
