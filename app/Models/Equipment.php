<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'description',
    ];
    
    // USADO PARA QUE POSSA O CRUD SUPPORTS
    // POSSA TER ACESSO A TABELA EQUIPMENTS
    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }
}
