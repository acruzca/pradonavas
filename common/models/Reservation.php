<?php
namespace common\models;

use yii\db\ActiveRecord;

class Reservation extends ActiveRecord
{
    public static function tableName()
    {
        return 'reservation';
    }

    public function rules()
    {
        return [
            [['apartment_id', 'user_id', 'start_date', 'end_date', 'total_price'], 'required'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:Y-m-d'],
            [['total_price'], 'number'],
            [['apartment_id', 'user_id'], 'integer'],
            [['start_date'], 'validateAvailability'],
            [['end_date'], 'compare', 'compareAttribute' => 'start_date', 'operator' => '>', 'message' => 'La fecha de finalización debe ser posterior a la fecha de inicio.'],
        ];
    }

    public function validateAvailability($attribute, $params)
    {
        $existing = self::find()
            ->where(['apartment_id' => $this->apartment_id])
            ->andWhere(['<', 'start_date', $this->end_date])
            ->andWhere(['>', 'end_date', $this->start_date])
            ->andWhere(['<>', 'id', $this->id]) // Evita conflictos con la misma reserva
            ->one();

        if ($existing) {
            $this->addError($attribute, 'El apartamento no está disponible en esas fechas.');
        }
    }

    public function getApartment()
    {
        return $this->hasOne(Apartment::class, ['id' => 'apartment_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
