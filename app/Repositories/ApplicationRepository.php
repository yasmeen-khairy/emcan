<?php

namespace App\Repositories;

use App\Models\Application;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class ApplicationRepository extends BaseRepository
{

    public function __construct(Application $application)
    {
        $this->model = $application;
    }

    public function getByUserId()
    {
        return $this->model->where('user_id' , Auth::id())->paginate(10);
    }

    public function getByCourseId($id)
    {
        return $this->model->where('course_id', $id)->where('user_id', Auth::id())->first();
    }

}
