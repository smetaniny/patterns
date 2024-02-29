<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminPermission extends Model
{
    use HasFactory;

    /**
     * Запрещенные поля для работы
     *
     * @var array
     */
    protected $guarded = [];

    // Связываем таблицу с ролью — один к одному
    public function role(): BelongsTo
    {
        return $this->belongsTo(AdminRole::class);
    }
}
