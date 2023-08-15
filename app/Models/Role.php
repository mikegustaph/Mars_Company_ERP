<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory;
    use HasRoles;

    protected $primarykey = 'id';

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name',
        'description'
    ];
}
