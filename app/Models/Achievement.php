<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'certification',
        'organization',
        'date',
        'images',
        'category'
    ];

    protected $casts = [
        'date' => 'datetime',
        'images' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
