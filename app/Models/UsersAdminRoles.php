<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей ролей пользователей админки
 *
 * Class UsersAdminRoles
 * @package App
 */
class UsersAdminRoles extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'users_admin_roles';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Запрещенные поля для работы
    protected $guarded = [];

    // Связываем таблицы
    public function usersAdmin()
    {
        return $this->belongsToMany('App\Models\UsersAdmin');
    }
}
