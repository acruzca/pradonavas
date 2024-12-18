<?php
namespace common\models;

use yii\db\ActiveRecord;

class Expense extends ActiveRecord
{
    public static function tableName()
    {
        return 'expense';
    }

    public function rules()
    {
        return [
            [['category', 'amount', 'description', 'expense_date'], 'required'],
            [['amount'], 'number'],
            [['expense_date'], 'safe'],
            [['category', 'description'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'category' => 'Categoría',
            'amount' => 'Monto',
            'description' => 'Descripción',
            'expense_date' => 'Fecha de Gasto',
        ];
    }
}
