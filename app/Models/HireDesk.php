<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireDesk extends Model
{
    use HasFactory;

    protected $table = 'hire_desks';

    protected $fillable = [
        'job_id',
        'candidate_id',
        'interview_date',
        'interviewer_id',
        'status',
        'feedback',
        'rating',
        'offer_extended',
        'is_active',
    ];

    protected $casts = [
        'interview_date' => 'datetime',
        'offer_extended' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function interviewer()
    {
        return $this->belongsTo(User::class, 'interviewer_id');
    }
}
