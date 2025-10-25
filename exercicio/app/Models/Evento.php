<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Ingressos;

class Evento extends Model
{
    use SoftDeletes;

    protected $database = "eventos";

    protected $primaryKey = "id";

    public function ingressos(): HasMany
    {
        return $this->hasMany(Ingressos::class);
    }
}
