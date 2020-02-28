<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id_city
 * @property string|null $name
 * @property string|null $comment
 * @property int|null $id_region
 */
class CityModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['id_region'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_city' => Yii::t('app', 'Id City'),
            'name' => Yii::t('app', 'Name'),
            'comment' => Yii::t('app', 'Comment'),
            'id_region' => Yii::t('app', 'Id Region'),
        ];
    }

    public function getAddress(){
        return $this->hasMany(AddressModel::className(), ['id_city' => 'id_city']);
    }
}
