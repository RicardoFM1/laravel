<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendas extends Model
{
 use SoftDeletes;

    protected $database = "vendas";

    protected $primaryKey = "id";


    public function ingresso(): BelongsTo {
        return $this->belongsTo(Ingressos::class);
    }
    public function evento(): BelongsTo {
        return $this->belongsTo(Evento::class);
    }
}
