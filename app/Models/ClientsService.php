<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClientsService extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'client_services';

    protected $fillable = [
        'clients_id',
        'services_id',
        'service_repeat',
        'schedule_start',
        'schedule_end',
        'status'
    ];

    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'clients_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
    public function serv()
    {
        return $this->hasOne(Service::class,'id');
    }
    /*public function cservice(): HasOne
    {
        return $this->hasOne(Service::class,'services_id');
    }*/

    public function cs_service(): HasOne
    {
        return $this->hasOne(Clients::class);
    }
}
