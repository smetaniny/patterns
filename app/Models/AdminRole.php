<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdminRole extends Model
{
    use HasFactory;

    /**
     * Запрещенные поля для работы
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Пользователи, принадлежащие этой роли
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(AdminUser::class)->withTimestamps();
    }

    // Связываем таблицу admin_roles c admin_permissions — один ко многим
    public function permissions(): HasMany
    {
        return $this->hasmany(AdminPermission::class);
    }
}
