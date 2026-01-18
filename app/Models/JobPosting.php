<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'department',
        'status',
        'applicants_count',
        'description',
        'job_type',
        'location',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function talentHubs()
    {
        return $this->hasMany(TalentHub::class, 'job_id');
    }

    public function hireDesks()
    {
        return $this->hasMany(HireDesk::class, 'job_id');
    }
}
