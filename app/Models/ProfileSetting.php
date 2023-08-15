<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSetting extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'Profilesetting';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];
}
