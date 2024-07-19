<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCardQuestionnaires extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'discount_card_questionnaires';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'surname',
        'name',
        'patronymic',
        'date_of_birth',
        'address',
        'phone',
        'email',
        'phone_action_new_post',
        'passport_series',
        'passport_number',
        'passport_date_of_issue',
        'passport_date_of_division',
        'passport_issued_by_whom',
        'passport_img',
        'discount_cards_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function discountCards()
    {
        return $this->hasOne('App\Models\DiscountCards');
    }
}
