<?php

namespace App\Repositories\Hotel;

use App\Models\Hotel;
use App\Repositories\AbstractRepository;

class HotelRepository extends AbstractRepository implements HotelRepositoryInterface
{
    public function __construct(Hotel $model)
    {
        parent::__construct($model);
    }
}
