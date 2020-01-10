<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property int|null $id_client
 * @property string $date
 * @property string|null $comment
 * @property int $status
 *
 * @property Client $client
 * @property ProductXOrder[] $productXOrders
 */
class OrderModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'status'], 'integer'],
            [['date'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => ClientModel::className(), 'targetAttribute' => ['id_client' => 'id_client']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => Yii::t('app', 'Id Order'),
            'id_client' => Yii::t('app', 'Id Client'),
            'date' => Yii::t('app', 'Date'),
            'comment' => Yii::t('app', 'Comment'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id_client' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductXOrders()
    {
        return $this->hasMany(ProductXOrder::className(), ['id_order' => 'id_order']);
    }
}
