<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель для работы с таблицей app_firebase_connect
 *
 * @method static find(mixed $data)
 * @method static Create(mixed $data)
 * @method select(string $string)
 * @method pluck(string $string)
 * @method where(string $string, $id)
 */
class FirebaseConnectModel extends Model
{
    use HasFactory;

    // Указываем таблицу с которой будем работать
    protected $table = 'app_firebase_connect';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть автоинкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    public $fillable = [
        'id',
        'user_id',
        'device_id',
        'token_firebase',
        'created_at',
        'updated_at'
    ];

    /**
     * Автор токена
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        //Токен принадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
