<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postchecks extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'service_postchecks';

    protected $fillable = [
        'name',
        'note',
        'multiple_upload',
        'mandatory',
        'description'
    ];
}
