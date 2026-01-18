<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffBoardDesk extends Model
{
    use HasFactory;

    protected $table = 'offboard_desks';

    protected $fillable = [
        'employee_id',
        'exit_date',
        'reason',
        'feedback',
        'asset_returned',
        'access_revoked',
        'status',
        'conducted_by',
        'is_active',
    ];

    protected $casts = [
        'exit_date' => 'date',
        'asset_returned' => 'boolean',
        'access_revoked' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function conductedBy()
    {
        return $this->belongsTo(User::class, 'conducted_by');
    }
}
