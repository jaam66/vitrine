<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Budget extends Model
{
    
    protected $fillable = [
        'arquivo',
    ];
    // USADO PARA QUE POSSA O CRUD SUPPORTS
    // POSSA TER ACESSO A TABELA EQUIPMENTS
    public function support(): belongsTo
    {
        return $this->belongsTo(Support::class);
    }

}
