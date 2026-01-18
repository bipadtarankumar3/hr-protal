<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentHub extends Model
{
    use HasFactory;

    protected $table = 'talent_hubs';

    protected $fillable = [
        'job_id',
        'candidate_name',
        'email',
        'phone',
        'resume_path',
        'status',
        'applied_date',
        'interview_date',
        'offer_status',
        'is_active',
    ];

    protected $casts = [
        'applied_date' => 'datetime',
        'interview_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
