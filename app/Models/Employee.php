<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;


    //Define Table Primary
    protected $primarykey  = 'id';

    //Define Table Name
    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'status',
        'images',
        'position',
        'cv',
        'contract',
        'application',
        'offer_letter',
        'nssf',
        'termination',
        'phone',
        'email',
        'joining_date',
        'contract_period',
        'tin',
        'nida',
        'username',
        'password'
    ];

    public function taskemployee(): HasMany
    {
        return $this->hasMany(Tasks::class, 'employees_id', 'id');
    }
}
