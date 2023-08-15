<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prechecks extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'service_prechecks';

    protected $fillable = [
        'name',
        'note',
        'multiple_upload',
        'mandatory',
        'description'
    ];
}
