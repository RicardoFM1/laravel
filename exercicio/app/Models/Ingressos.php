<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingressos extends Model
{
    use SoftDeletes;

    protected $database = "ingressos";

    protected $primaryKey = "id";

    public $timestamps = false;

    public function evento(): BelongsTo{
        return $this->belongsTo(Evento::class);
    }
}
