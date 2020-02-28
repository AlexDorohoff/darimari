<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id_client
 * @property string $name
 * @property string|null $last_name
 * @property int|null $id_address
 *
 * @property Order[] $orders
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
            [['id_address'], 'integer'],
            [['name', 'last_name'], 'string', 'max' => 255],
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
            'id_address' => Yii::t('app', 'Id Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_client' => 'id_client']);
    }
}
