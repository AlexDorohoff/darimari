<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property int|null $id_client
 * @property string $date
 * @property string|null $comment
 * @property int $status
 *
 * @property ClientModel $client
 * @property ProductXOrderModel[] $productXOrders
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
            [['status'], 'required'],
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
        return $this->hasOne(ClientModel::className(), ['id_client' => 'id_client']);
    }

    public static function getClientsList()
    {
        $cities = ClientModel::find()->all();
        $items = ArrayHelper::map($cities, 'id_client', 'name');
        return $items;
    }

}
