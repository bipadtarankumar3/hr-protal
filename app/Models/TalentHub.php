<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentHub extends Model
{
    use HasFactory;

    protected $table = 'talent_hubs';

    protected $fillable = [
        'employee_id',
        'name',
        'skills',
        'experience_level',
        'department',
        'department_id',
        'location',
        'career_path',
        'applied_date',
        'status',
        'notes',
        'application_limit',
        'hiring_manager',
        'project',
        'is_active',
    ];

    protected $casts = [
        'applied_date' => 'date',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function departmentRelation()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
