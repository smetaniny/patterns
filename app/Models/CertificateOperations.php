<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateOperations extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'certificate_operations';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'vid_operation',
        'sum_cert',
        'status',
        'certificate_id',
        'order_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function certificate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
