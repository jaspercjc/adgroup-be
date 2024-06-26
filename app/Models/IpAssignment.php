<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sortable;
use App\Traits\Searchable;

class IpAssignment extends Model
{
    use HasFactory;
    use Sortable;
    use Searchable;

    protected $fillable = [
        'ip_address',
        'assignment',
    ];

    protected $searchableFields = [
        'ip_address',
        'assignment'
    ];

    public function logs()
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }
}
