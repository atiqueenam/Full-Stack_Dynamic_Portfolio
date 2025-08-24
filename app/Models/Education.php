<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    protected $table = 'educations';
    
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'institute',
        'enrolled_year',
        'passing_year',
        'grade'
    ];

    protected $casts = [
        'enrolled_year' => 'integer',
        'passing_year' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
