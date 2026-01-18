<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnboardPro extends Model
{
    use HasFactory;

    protected $table = 'onboard_pros';

    protected $fillable = [
        'employee_id',
        'joining_date',
        'orientation_completed',
        'documents_collected',
        'system_access_provided',
        'mentor_assigned',
        'training_status',
        'status',
        'is_active',
    ];

    protected $casts = [
        'joining_date' => 'date',
        'orientation_completed' => 'boolean',
        'documents_collected' => 'boolean',
        'system_access_provided' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_assigned');
    }
}
