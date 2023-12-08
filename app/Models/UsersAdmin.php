<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Модель для работы с таблицей пользователей админки
 *
 * Class UsersAdmin
 * @package App
 */
//class UsersAdmin extends Model
class UsersAdmin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    //Указываем таблицу с которой будем работать
    protected $table = 'users_admin';

    //Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    //Есть автоинкремент
    public $incrementing = true;

    //Автоматом писать дату добавления и обновления
    public $timestamps = true;

    //Разрешенные поля для работы
    protected $fillable = [
        'id',
        'login',
        'password',
        'password_start',
        'surname',
        'name',
        'patronymic',
        'email',
        'email_verified_at',
        'ip',
        'token',
        'status',
        'created_at',
        'updated_at'
    ];

    public function usersAdminRoles() {
        //Связываем таблицы
        return $this->belongsToMany('App\Models\UsersAdminRoles');
    }
}
