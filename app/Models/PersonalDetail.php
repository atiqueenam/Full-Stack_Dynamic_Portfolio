<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $fillable = [
        'full_name',
        'title',
        'bio',
        'phone',
        'email',
        'location',
        'website',
        'linkedin',
        'github',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'profile_image'
    ];
}
