<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Модель для работы с таблицей пользователей
 *
 * Class User
 * @package App
 * @method static where(string $string, string $string1, mixed $user_id)
 * @method static width(string $string, mixed $getAuthIdentifier)
 * @method static create(array $input)
 * @method static findOrFail(int $int): выбросит исключение ModelNotFoundException в случае отсутствия пользователя с указанным идентификатором
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'surname',
        'name',
        'patronymic',
        'phone',
        'email',
        'sex',
        'date_of_birth',
        'passport_series',
        'passport_number',
        'passport_date_of_issue',
        'passport_date_of_division',
        'passport_issued_by_whom',
        'delivery_address',
        'flat',
        'email_verified_at',
        'mailing',
        'remember_token',
        'password',
        'card_number',
        'mail_basket_status',
        'mail_action_new_post',
        'push_notifications',
        'password_old',
        'salt_old',
        'ip',
        'user_active_date',
        'user_status_basket',
        'exchange_statuses',
        'created_at',
        'updated_at',
        'is_active',
        'payment_only_online',
        'is_barcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'password_old', 'salt_old'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "user_active_date" => "datetime"
    ];

    // Связываем таблицу users c users_wish_list — один ко многим
    public function usersWishList()
    {
        return $this->hasmany('App\Models\UsersWishList', 'users_id', 'id');
    }

    // Связываем таблицу users c users_wait_list — один ко многим
    public function usersWaitList()
    {
        return $this->hasmany('App\Models\UsersWaitList', 'users_id', 'id');
    }

    // Связываем таблицу users c users_review — один ко многим
    public function usersReview()
    {
        return $this->hasmany('App\Models\UsersReview', 'users_id', 'id');
    }

    // Связываем таблицу — один ко многим
    public function basket()
    {
        return $this->hasmany('App\Models\Basket', 'user_id', 'id');
    }

    // Связываем таблицу users c delivery_adress — один ко многим
    public function deliveryAddress()
    {
        return $this->hasmany('App\Models\DeliveryAddress', 'users_id', 'id');
    }

    // Связываем таблицу users c social_accounts — один ко многим
    public function socialAccount()
    {
        return $this->hasmany('App\Models\SocialAccount', 'user_id', 'id');
    }

    // Связываем таблицу users c faq — один ко многим
    public function faq()
    {
        return $this->hasmany('App\Models\Faq', 'users_id', 'id');
    }

    // Связываем таблицу users c order — один ко многим
    public function order()
    {
        return $this->hasmany('App\Models\Order', 'users_id', 'id');
    }

    // Связываем таблицу — один к одному
    public function context()
    {
        return $this->hasOne('App\Models\Context');
    }

    // Связываем таблицу users c answers_questions — один ко многим
    public function questionnaire()
    {
        return $this->hasmany('App\Models\Questionnaire', 'users_id', 'id');
    }

    // Отношение один к одному к заявке на возврат
    public function returnOrder()
    {
        return $this->hasOne(ReturnOrders::class, 'user_id');
    }
}
