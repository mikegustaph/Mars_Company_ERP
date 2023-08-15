<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    use HasFactory;

    //Table Primary
    protected $primarykey  = 'id';

    //Table Name
    protected $table = 'clients';

    //Table Columns

    protected $fillable = [
        'name',
        'tradeas',
        'address1',
        'plot',
        'block',
        'house',
        'status',
        'city',
        'phone_number',
        'email',
        'tin_number',
        'tinCert',
        'vrn',
        'efin',
        'efin_password',
        'tax_region',
        'brelaORS',
        'CertofReg',
        'CertExtr',
        'certVat',
        'CertIncorp',
        'memart',
        'CertRegDate',
        'tax_file_location',
        'fiscal_yr',
        'company_type',
        'contactPerson_id'
    ];

    public function contactPeople(): HasOne
    {
        return $this->hasOne(ContactPerson::class, 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'clients_id');
    }
    public function ClientService(): BelongsTo
    {
        return $this->belongsTo(ClientsService::class, 'clients_id', 'id');
    }
    public function clientserv()
    {
        return $this->hasOne(ClientsService::class, 'clients_id');
    }
    public function dispatchjob(): HasOne
    {
        return $this->hasOne(DispatchJob::class);
    }
    public function companytype()
    {
        return $this->belongsTo(CompanyType::class, 'client_id');
    }
    public function compType()
    {
        return $this->hasOne(CompanyType::class, 'client_id', 'id');
    }
}
