<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusOperationTypes extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'bonus_operation_types';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'name',
        'activity',
        'bonus_operation_names_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу bonus_operation_types c bonus_operation_rules — один ко многим
    public function bonusOperationRules() {
        return $this->hasmany('App\Models\BonusOperationRules', 'bonus_operation_types_id', 'id');
    }

    // Связываем таблицу bonus_operation_types c bonus_operation_futures — один ко многим
    public function bonusOperationFutures() {
        return $this->hasmany('App\Models\BonusOperationFutures', 'bonus_operation_types_id', 'id');
    }
}
