<?php
namespace common\models;

use yii\db\ActiveRecord;

class Invoice extends ActiveRecord
{
    public static function tableName()
    {
        return 'invoice';
    }

    public function rules()
    {
        return [
            [['reservation_id', 'total_amount', 'invoice_number'], 'required'],
            [['reservation_id'], 'integer'],
            [['total_amount'], 'number'],
            [['issue_date'], 'safe'],
            [['invoice_number'], 'string', 'max' => 50],
            [['invoice_number'], 'unique'],
        ];
    }

    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['id' => 'reservation_id']);
    }
}
