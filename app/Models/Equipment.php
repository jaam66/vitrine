<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'description',
    ];
    // USADO PARA QUE POSSA O CRUD SUPPORTS
    // POSSA TER ACESSO A TABELA EQUIPMENTS
    public function support(): belongsTo
    {
        return $this->belongsTo(Support::class);
    }

    public static function buscaSuporte($id_equipamento){
        // dd($id_equipamento);
        $support = DB::table('supports')->where('equipment_id', $id_equipamento)->value('equipment_id');
        if($support > 0){
            return "T";
        }
        return "F";
    }

    public static function buscaOS($id_equipamento){
        // dd($id_equipamento);
        $support = DB::table('supports')->where('equipment_id', $id_equipamento)->value('os');
        if($support > 0){
            return $support;
        }
        return "F";
    }
}
