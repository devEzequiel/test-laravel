<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll(array $filter)
    {
        return $this->model->filter($filter)->get();
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $entity = $this->model->findOrFail($id);
        $entity->update($data);
        return $entity;
    }

    public function delete($id): void
    {
        $entity = $this->model->findOrFail($id);
        $entity->delete();
    }
}
