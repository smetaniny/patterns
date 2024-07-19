<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vacancies - работа с вакансиями
 * @package App
 */
class Vacancies extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'vacancies';

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
        'phone',
        'email',
        'position',
        'link_to_resume',
        'description',
        'checkedPersonal',
        'created_at',
        'updated_at'
    ];
}
