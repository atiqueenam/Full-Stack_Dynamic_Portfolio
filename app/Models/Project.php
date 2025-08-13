<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'name',
        'description',
        'technologies',
        'project_url',
        'github_url',
        'demo_url',
        'image',
        'images',
        'type',
        'reference',
        'tools',
        'keywords',
        'status',
        'is_featured',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'images' => 'array',
        'tools' => 'array',
        'keywords' => 'array',
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
