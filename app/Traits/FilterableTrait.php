<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FilterableTrait
{
    /**
     * Apply filters to a query
     */
    protected function applyFilters($query, Request $request, array $searchableFields = [], array $filterFields = [])
    {
        // Search filter
        if ($request->filled('search') && !empty($searchableFields)) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search, $searchableFields) {
                foreach ($searchableFields as $field) {
                    $q->orWhere($field, 'like', "%$search%");
                }
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Dynamic filters
        foreach ($filterFields as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->input($field));
            }
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        
        // Validate sort fields to prevent SQL injection
        $allowedSort = array_merge(['id', 'created_at', 'updated_at'], $searchableFields, $filterFields);
        if (in_array($sortBy, $allowedSort)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        return $query;
    }
}
