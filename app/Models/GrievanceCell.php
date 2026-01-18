<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrievanceCell extends Model
{
    use HasFactory;

    protected $table = 'grievance_cells';

    protected $fillable = [
        'employee_id',
        'grievance_type',
        'description',
        'status',
        'priority',
        'assigned_to',
        'resolution',
        'resolved_date',
        'is_active',
    ];

    protected $casts = [
        'resolved_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
