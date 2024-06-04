<?php
namespace App\Traits;

trait Sortable
{
    public function scopeSortBy($query, $request)
    {
        if ($request->has('sortBy')) {
            $direction = $request->has('descending') && $request->descending == 'true' ? 'DESC' : 'ASC';
            $query = $query->orderBy($request->sortBy, $direction);
        }
        return $query;
    }

}
