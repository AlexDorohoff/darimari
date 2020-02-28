<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_x_order".
 *
 * @property int $id_product_x_order
 * @property int|null $id_product
 * @property int|null $id_order
 *
 * @property OrderModel $order
 * @property ProductModel $product
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
            [['id_product', 'id_order', 'amount'], 'integer'],
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

    public function getProductsList()
    {
        $cities = ProductModel::find()->all();
        $items = ArrayHelper::map($cities, 'id_product', 'name');
        return $items;
    }

    public static function getProductsByOrder($id_order)
    {
        $order_x_product = ProductXOrderModel::find()->where(['id_order' => $id_order])->all();
        $product = new ProductModel();
        $products = [];
        $set = [];
        foreach ($order_x_product as $product_id) {
            $prod = $product::find()
                ->where(['product.id_product' => $product_id->id_product])->one();
            $form = new OrderForm();
            $form->setForm($prod, $product_id);
            array_push($products, $form);
        }

        /* $a = ProductXOrderModel::find()
             ->leftJoin('product', 'product.id_product = product_x_order.id_product')
             ->leftJoin('order','order.id_order = product_x_order.id_order')
             ->where(['product_x_order.id_order' => $id_order])->all();
 */
        return $products;
    }
}
