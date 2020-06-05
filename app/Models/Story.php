<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Story extends Model
{
    protected $guarded = [];

    protected $dates = [
        'due_date',
    ];

    protected $with = ['creator']; //With creater (user data) when fetch story

    public function getStoryTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function users()
    {
        return $this->hasMany(StoryUsers::class)->with('user');
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
