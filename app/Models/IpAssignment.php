<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'assignment',
    ];

    public function scopeSearchBy($query, $request)
    {
        if ($request->has('search') && !empty($request->search)) {
            $term = $request->search;
            $query->where('ip_address', 'LIKE', '%'.$term.'%')
                ->orWhere('assignment', 'LIKE', '%'.$term.'%');
        }
    }

    public function scopeSortBy($query, $request)
    {
        if ($request->has('sortBy')) {
            $direction = $request->has('descending') && $request->descending == 'true' ? 'DESC' : 'ASC';
            $query = $query->orderBy($request->sortBy, $direction);
        }
    }
}
