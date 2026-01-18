<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'manager_id',
        'code',
        'budget',
        'is_active',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function head()
    {
        return $this->belongsTo(User::class, 'head_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function teamMaps()
    {
        return $this->hasMany(TeamMap::class);
    }

    public function projects()
    {
        return $this->hasMany(ProjectDesk::class);
    }

    public function talentVaults()
    {
        return $this->hasMany(TalentVault::class);
    }
}
