<?php


namespace App\Traits;


trait Searchable
{
    public function scopeSearchBy($query, $request)
    {
        if ( is_array($this->searchableFields) && $request->has('search') && $request->search) {
            foreach ($this->searchableFields as $field) {
                $query = $query->orWhere($field, 'LIKE', '%' . $request->search . '%');
            }
        }
        return $query;
    }
}