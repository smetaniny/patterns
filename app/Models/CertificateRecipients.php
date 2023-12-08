<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateRecipients extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'certificate_recipients';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'recipient_name',
        'recipient_phone',
        'recipient_email',
        'recipient_message',
        'send_status',
        'send_date',
        'user_id',
        'certificate_id',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу — один к одному
    public function certificate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
