<?php
namespace common\models;

use yii\db\ActiveRecord;

class Guest extends ActiveRecord
{
    public static function tableName()
    {
        return 'guest';
    }

    public function rules()
    {
        return [
            [['reservation_id', 'first_name', 'last_name', 'document_number', 'birth_date'], 'required'],
            [['reservation_id'], 'integer'],
            [['birth_date'], 'date', 'format' => 'php:Y-m-d'],
            [['first_name', 'last_name', 'document_number', 'email'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'email'],
        ];
    }

    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['id' => 'reservation_id']);
    }
}
