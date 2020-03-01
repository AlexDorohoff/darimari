<?php


namespace frontend\models;

use yii\base\Model;


class OrderForm extends Model
{
    public $product;
    public $productXOrder;

    public function setForm($product, $productXOrder){
        $this->product = $product;
        $this->productXOrder =  $productXOrder;
    }
}