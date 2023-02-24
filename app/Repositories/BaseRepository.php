<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository
{
    protected Model $model;

    public function get(): Collection
    {
        return $this->model->newQuery()->get();
    }

    public function store(array $data): Model
    {
        $model = $this->model->fill($data);
        $model->save();

        return $model;
    }

    public function update(Model $model, array $data): Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
