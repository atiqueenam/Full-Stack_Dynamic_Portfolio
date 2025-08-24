<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $fillable = [
        'user_id',
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
        'profile_image',
        'description',
        'blood_group',
        'department',
        'age',
        'dob',
        'address',
        'gender'
    ];

    protected $casts = [
        'dob' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
