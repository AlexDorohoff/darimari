<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_x_order".
 *
 * @property int $id_product_x_order
 * @property int|null $id_product
 * @property int|null $id_order
 *
 * @property Order $order
 * @property Product $product
 */
class ProductXOrderModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_x_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_order'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => OrderModel::className(), 'targetAttribute' => ['id_order' => 'id_order']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => ProductModel::className(), 'targetAttribute' => ['id_product' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product_x_order' => Yii::t('app', 'Id Product X Order'),
            'id_product' => Yii::t('app', 'Id Product'),
            'id_order' => Yii::t('app', 'Id Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrderModel::className(), ['id_order' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductModel::className(), ['id_product' => 'id_product']);
    }
}
