<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecieveDoc extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'recieve_docs';

    protected $fillable = [
        'task_id',
        'client_id',
        'service_id',
        'dateReceived',
        'note',
        'quantity',
        'fileType',
        'narration'
    ];
}
