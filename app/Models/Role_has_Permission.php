<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role_has_Permission extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'role_has_permissions';

    protected $fillable = [
        'permission_id',
        'role_id'
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class, "permission_id");
    }
}
