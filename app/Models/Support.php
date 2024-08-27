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
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'os',
        'sender',
        'equipment_id',
        'subject',
        'body',
    ];

    public function equipment(): belongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

}