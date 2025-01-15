<?php

namespace App\Models;

use App\Models\User;
use App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable =['title' , 'description' , 'start_date' , 'end_date'];

    public function users() {

        return $this->belongsToMany(User::class);

    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
