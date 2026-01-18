<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMaster extends Model
{
    use HasFactory;

    protected $table = 'role_masters';

    protected $fillable = [
        'name',
        'code',
        'description',
        'permissions',
        'salary_grade',
        'is_active',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_active' => 'boolean',
    ];
}
