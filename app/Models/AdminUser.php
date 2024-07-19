<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Запрещенные поля для работы
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Роли, принадлежащие пользователю.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class)->withTimestamps();
    }

    /**
     * Определяет заблокирован ли пользователь
     *
     * @return bool
     */
    public function isBlocked(): bool
    {
        return $this->is_active === 0;
    }

    /**
     * Определяет является ли пользователь владельцем
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner === 1;
    }
}
