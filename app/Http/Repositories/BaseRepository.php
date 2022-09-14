<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($attributes, $id)
    {
        // dd($attributes);
        return $this->model->where('id', $id)->update($attributes);
    }
}