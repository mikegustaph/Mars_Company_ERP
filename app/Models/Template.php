<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'template';

    protected $fillable = [
        'name',
        'description',
        'file'
    ];
}
