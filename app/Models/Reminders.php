<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminders extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'reminders';

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'frequency'
    ];
}
