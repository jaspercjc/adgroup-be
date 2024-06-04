<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Sortable;
use App\Traits\Searchable;

class ActivityLog extends Model
{
    use HasFactory;
    use Sortable;
    use Searchable;

    protected $fillable = [
        'action',
        'user_id',
    ];

    protected $searchableFields = [
        'action',
    ];

    public function loggable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
