<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyAttendanceNote extends Model
{
    use HasFactory;

    protected $table = 'weekly_attendance_notes';

    protected $fillable = [
        'employee_id',
        'week_start_date',
        'week_end_date',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'week_start_date' => 'date',
        'week_end_date' => 'date',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
