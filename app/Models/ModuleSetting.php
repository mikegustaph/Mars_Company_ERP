<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleSetting extends Model
{
    use HasFactory;
    protected $primarykey = 'id';

    protected $table = 'module_settings';

    protected $fillable  = [
        'tax_region'
    ];
}
