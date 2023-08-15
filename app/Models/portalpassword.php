<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portalpassword extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'pwdportal';

    protected $fillable = [
        'client_id',
        'tra_portal_name',
        'tra_portal_tin',
        'tax_portal_passwrd',
        'tax_portal_tin',
        'payment_passwrd',
        'brela_name',
        'brela_userid',
        'brela_passwrd',
        'nssf_userid',
        'nssf_passwrd',
        'efin_userid',
        'efin_passwrd',
        'wcf_name',
        'wcf_userid',
        'wcf_passwrd',
        'wcf_ic_name',
        'wcf_ic_userid',
        'wcf_ic_passwrd',
        'bo_name',
        'bo_userid',
        'bo_passwrd'
    ];
}
