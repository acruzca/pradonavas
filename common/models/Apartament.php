<?php
namespace common\models;

use yii\db\ActiveRecord;

class Apartment extends ActiveRecord
{
    public static function tableName()
    {
        return 'apartment';
    }

    public function rules()
    {
        return [
            [['title', 'price', 'availability_from', 'availability_to', 'owner_id'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['availability_from', 'availability_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'owner_id']);
    }
}
