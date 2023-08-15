<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactPerson extends Model
{
    use HasFactory;

    protected $primarykey  = 'id';

    //Define Table Name
    protected $table = 'contact_people';


    protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'position',
        'phone',
        'email',
        'tin',
        'radio',
        'passport',
        'passportcopy',
        'nida',
        'nidacopy'
    ];

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'contactPerson_id ');
    }
    public function clien()
    {
        return $this->hasOne(Client_ContactPerson::class, 'client_id ');
    }
}
