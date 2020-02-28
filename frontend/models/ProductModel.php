<?php

namespace frontend\models;

use common\models\AddressModel;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property string|null $name
 * @property string|null $comment
 *
 * @property ProductXOrder[] $productXOrders
 */
class ProductModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => Yii::t('app', 'Id Product'),
            'name' => Yii::t('app', 'Name'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductXOrder()
    {
        return $this->hasMany(ProductXOrderModel::className(), ['id_product' => 'id_product']);
    }

    public static function getAllProducts($id){
        $dataProvider = new ActiveDataProvider([
            'query' => ProductModel::find()->where(['id_client' => $id])->joinWith('city'),
        ]);
        $adresess = $dataProvider->getModels();
        return $adresess;
    }
}
