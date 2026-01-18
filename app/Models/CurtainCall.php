<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurtainCall extends Model
{
    use HasFactory;

    protected $table = 'curtain_calls';

    protected $fillable = [
        'employee_id',
        'resignation_date',
        'last_working_day',
        'notice_period',
        'reason',
        'status',
        'handover_status',
        'is_active',
    ];

    protected $casts = [
        'resignation_date' => 'date',
        'last_working_day' => 'date',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
