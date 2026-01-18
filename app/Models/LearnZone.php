<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnZone extends Model
{
    use HasFactory;

    protected $table = 'learn_zones';

    protected $fillable = [
        'title',
        'description',
        'category',
        'content',
        'instructor_id',
        'duration',
        'level',
        'status',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
