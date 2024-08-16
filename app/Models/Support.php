<?php
// ----------------------------------------------------------------------------------------------------------
// DÚVIDAS
// ----------------------------------------------------------------------------------------------------------
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'equipment_id',
        'subject',
        'body',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

}