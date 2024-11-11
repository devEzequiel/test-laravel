<?php

namespace App\Repositories\Hotel;

interface HotelRepositoryInterface
{
    public function getAll(array $filters);

    public function findById($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
