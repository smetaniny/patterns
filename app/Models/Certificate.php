<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    // Указываем таблицу с которой будем работать
    protected $table = 'certificates';

    // Указываем уникальное поле таблицы
    protected $primaryKey = 'id';

    // Есть авто инкремент
    public $incrementing = true;

    // Автоматом писать дату добавления и обновления
    public $timestamps = true;

    /**
     * Динамический атрибут
     * @var string[]
     */
    protected $appends = ['image'];

    // Разрешенные поля для работы
    protected $fillable = [
        'id',
        'number',
        'type',
        'total',
        'status',
        'balance',
        'date_start',
        'date_end',
        'template',
        'created_at',
        'updated_at'
    ];

    // Связываем таблицу certificates c certificate_operations — один ко многим
    public function certificateOperations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasmany(CertificateOperations::class);
    }

    // Связываем таблицу certificates с certificate_recipients — один к одному
    public function certificateRecipients(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CertificateRecipients::class);
    }

    /**
     * Динамический атрибут (Шаблон подарочного сертификата)
     */
    protected function image(): Attribute
    {
        $certificatesConfig = config('platina-config.certificates');
        return new Attribute(
            get: fn () => $this->attributes['image'] = $certificatesConfig['design'][$this->template],
        );
    }

    // Динамический атрибут (Шаблон подарочного сертификата)
//    public function getImageAttribute()
//    {
//        $certificatesConfig = config('platina-config.certificates');
//        return $this->attributes['image'] = $certificatesConfig['design'][$this->template];
//    }
}
