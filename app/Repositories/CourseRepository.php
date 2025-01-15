<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\BaseRepository;

class CourseRepository extends BaseRepository
{

    public function __construct(Course $course)
    {
        $this->model = $course;
    }

}
