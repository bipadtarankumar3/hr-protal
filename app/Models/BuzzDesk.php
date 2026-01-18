<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuzzDesk extends Model
{
    use HasFactory;

    protected $table = 'buzz_desks';

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'category',
        'image',
        'status',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
