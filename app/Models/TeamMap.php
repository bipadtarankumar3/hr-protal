<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMap extends Model
{
    use HasFactory;

    protected $table = 'team_maps';

    protected $fillable = [
        'team_name',
        'team_lead_id',
        'department_id',
        'member_count',
        'description',
        'focus_area',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function teamLead()
    {
        return $this->belongsTo(User::class, 'team_lead_id');
    }
}
