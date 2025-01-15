<?php

namespace App\Repositories;

use App\Models\User;

class BaseRepository
{
    protected $model;

    public function getAll()
    {
        return $this->model->paginate(10);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return $model;
        }
        return null;
    }
}
