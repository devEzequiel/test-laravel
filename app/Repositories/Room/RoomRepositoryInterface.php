<?php

namespace App\Repositories\Room;

interface RoomRepositoryInterface
{
    public function getAll(array $filters);

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
