<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CompanyType extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'company_types';

    protected $fillable = [
        'companytype',
    ];
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}

