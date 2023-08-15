<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DispatchJob extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'dispatchjob';

    protected $fillable = [
            'clients_id',
            'dispatch_date',
            'checkout',
            'narration',
            'custom_desc',
            'custom_check',
            'custom_narration',
            'dispatch_note'
    ];
    public function client()
    {
        return $this->belongsTo(Clients::class, 'id');
    }
}
