<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PulseLog extends Model
{
    use HasFactory;

    protected $table = 'pulse_logs';

    protected $fillable = [
        'employee_id',
        'check_in_time',
        'check_out_time',
        'date',
        'hours_worked',
        'status',
        'remarks',
        'is_active',
    ];

    protected $casts = [
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime',
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
