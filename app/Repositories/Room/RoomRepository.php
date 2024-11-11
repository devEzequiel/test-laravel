<?php

namespace App\Repositories\Room;

use App\Models\Room;
use App\Repositories\AbstractRepository;

class RoomRepository extends AbstractRepository implements RoomRepositoryInterface
{
    public function __construct(Room $model)
    {
        parent::__construct($model);
    }
}
