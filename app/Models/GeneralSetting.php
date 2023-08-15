<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'generalsetting';

    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'logo',
        'favicon',
        'footer',
        'address'
    ];
}
