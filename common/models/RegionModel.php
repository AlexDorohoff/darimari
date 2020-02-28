<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id_region
 * @property string|null $name
 * @property string|null $comment
 */
class RegionModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
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
            'id_region' => Yii::t('app', 'Id Region'),
            'name' => Yii::t('app', 'Name'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }
}
