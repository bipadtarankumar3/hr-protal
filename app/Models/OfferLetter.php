<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    use HasFactory;

    protected $table = 'offer_letters';

    protected $fillable = [
        'candidate_id',
        'position',
        'department',
        'salary',
        'joining_date',
        'offer_status',
        'document_path',
        'sent_date',
        'accepted_date',
        'is_active',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'joining_date' => 'date',
        'sent_date' => 'datetime',
        'accepted_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }
}
