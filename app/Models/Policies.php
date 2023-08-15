<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'policies';

    protected $fillable = [
        'policy_name',
        'file'
    ];
}
