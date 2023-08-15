<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_ContactPerson extends Model
{
    use HasFactory;

    protected $primary = 'id';

    protected $table = 'client__contact_people';

    protected $fillable = [
        'client_id',
        'contact_people_id',
        'director',
        'shareholder',
        'shareholding',
        'share_percent',
    ];

    public function clientsContact()
    {
        return $this->hasOne(ContactPerson::class, 'id');
    }
    public function personContact()
    {
        return $this->hasOne(ContactPerson::class, 'id');
    }
}
