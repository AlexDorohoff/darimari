<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_x_order".
 *
 * @property int $id_productXOrder
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

    public static function getProductsList()
    {
        $cities = ProductModel::find()->all();
        $items = ArrayHelper::map($cities, 'id_product', 'name');
        return $items;
    }

    public static function getProductsByOrder($id_order)
    {
        $productXOrderArr = ProductXOrderModel::find()->where(['id_order' => $id_order])->all();
        $product = new ProductModel();
        $products = [];
        foreach ($productXOrderArr as $productXOrder) {
            $prod = $product::find()
                ->where(['product.id_product' => $productXOrder->id_product])->one();
            if (!empty($prod)) {
                $form = new OrderForm();
                $form->setForm($prod, $productXOrder);
                array_push($products, $form);
            }
        }
        return $products;
    }
}
