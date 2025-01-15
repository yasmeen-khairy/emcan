<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
