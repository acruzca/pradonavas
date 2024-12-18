<?php
namespace common\models;

use yii\db\ActiveRecord;

class Receipt extends ActiveRecord
{
    public static function tableName()
    {
        return 'receipt';
    }

    public function rules()
    {
        return [
            [['reservation_id', 'amount_paid', 'payment_method'], 'required'],
            [['reservation_id'], 'integer'],
            [['amount_paid'], 'number'],
            [['payment_date'], 'safe'],
            [['payment_method'], 'in', 'range' => ['cash', 'card', 'transfer']],
        ];
    }

    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['id' => 'reservation_id']);
    }
}
