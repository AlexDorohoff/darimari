<?php


namespace frontend\models;


use yii\base\Model;

class ProductForm extends Model
{
    public $name;
    public $amount;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'amount'], 'required'],
        ];
    }

    public function setForm($name, $amount){
        $this->name = $name;
        $this->amount = $amount;
    }
}