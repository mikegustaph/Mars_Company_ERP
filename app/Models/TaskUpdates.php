<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUpdates extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'task_updates';

    protected $fillable = [
        'task_update',
        'employee_id',
        'task_id'
    ];
}
