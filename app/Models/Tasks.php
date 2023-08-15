<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tasks extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'tasks';

    protected $fillable = [

        'clients_id',
        'service_id',
        'employee_id',
        'start_date',
        'end_start',
        'job_date_documents_received_precheck',
        'job_kpi_enabled',
        'job_kpi_deadline_to_receive_document',
        'job_date_documents_receive',
        'job_kpi_points_to_receive_documents',
        'job_kpi_deadline_to_complete',
        'job_kpi_points_to_complete_job',

    ];


    public function taskjob()
    {
      //  return $this->belongsTo(Service::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function client(): BelongsTo
    {
       return $this->belongsTo(Client::class,'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function clientservice(): BelongsTo
    {
        return $this->belongsTo(ClientsService::class);
    }
}
