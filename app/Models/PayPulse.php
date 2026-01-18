<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayPulse extends Model
{
    use HasFactory;

    protected $table = 'pay_pulses';

    protected $fillable = [
        'employee_id',
        'payroll_month',
        'basic_salary',
        'allowances',
        'deductions',
        'net_salary',
        'status',
        'processed_date',
        'remarks',
        'is_active',
    ];

    protected $casts = [
        'basic_salary' => 'decimal:2',
        'allowances' => 'decimal:2',
        'deductions' => 'decimal:2',
        'net_salary' => 'decimal:2',
        'processed_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
