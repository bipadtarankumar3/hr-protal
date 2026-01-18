<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $table = 'kycs';

    protected $fillable = [
        'employee_id',
        'aadhar_number',
        'pan_number',
        'passport_number',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'verification_status',
        'verified_date',
        'is_active',
    ];

    protected $casts = [
        'verified_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
