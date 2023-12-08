<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $int)
 */
class HomeCarousel extends Model
{
    //Указываем таблицу с которой будем работать
    protected $table = 'home_carousel';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'status',
        'sort',
        'dateStart',
        'dateEnd',
        'label',
        'link',
        'imgPath',
        'imgMobilePath',
        'status_app',
        'link_app',
        'created_at',
        'updated_at'
    ];
}
