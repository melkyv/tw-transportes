<?php

namespace App\Models;

use App\Enums\FreteStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Frete extends Model
{
    protected $fillable = [
        'codigo_rastreio',
        'status',
        'origem',
        'destino',
        'remetente_id',
        'destinatario_id'
    ];
    
    protected function casts(): array
    {
        return [
            'status' => FreteStatus::class
        ];
    }

    public function etapas(): HasMany
    {
        return $this->hasMany(Etapa::class);
    }

    public function remetente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}