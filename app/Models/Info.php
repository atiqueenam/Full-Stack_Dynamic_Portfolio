<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Info extends Model
{
    protected $fillable = [
        'user_id',
        'portfolio',
        'address',
        'description',
        'designation',
        'scienthush_description',
        'scienthush_facebook_url',
        'scienthush_youtube_url',
        'scienthush_featured_videos',
        'show_scienthush_section'
    ];

    protected $casts = [
        'scienthush_featured_videos' => 'array',
        'show_scienthush_section' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
