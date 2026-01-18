<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDesk extends Model
{
    use HasFactory;

    protected $table = 'project_desks';

    protected $fillable = [
        'project_name',
        'description',
        'manager_id',
        'department_id',
        'start_date',
        'end_date',
        'budget',
        'status',
        'progress_percentage',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
