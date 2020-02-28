<?php


namespace frontend\models;

use yii\base\Model;


class OrderForm extends Model
{
    public $product;
    public $product_x_order;

    public function setForm($product, $product_x_order){
        $this->product = $product;
        $this->product_x_order =  $product_x_order;
    }
}