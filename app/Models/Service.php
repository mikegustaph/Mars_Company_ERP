<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'services';

    protected $fillable = [
        'service_name',
        'description',
        'duedate',
        'repeat',
        'service_kpi',
        'kpi_receive_target_day',
        'kpi_receive_early_points',
        'kpi_receive_late_points',
        'kpi_complete_target_day',
        'kpi_complete_early_points',
        'kpi_complete_late_points'
    ];

    public function task(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    public function serviceTask(): HasMany
    {
        return $this->hasMany(Tasks::class);
    }
    public function clientservice()
    {
        return $this->hasOne(ClientsService::class, 'services_id');
    }

}
