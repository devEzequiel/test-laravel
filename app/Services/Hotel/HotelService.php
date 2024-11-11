<?php

namespace App\Services\Hotel;

use App\Repositories\Hotel\HotelRepositoryInterface;

class HotelService
{
    protected HotelRepositoryInterface $hotelRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function getAllHotels(array $filters = [])
    {
        return $this->hotelRepository->getAll($filters);
    }

    public function findHotelById($id)
    {
        return $this->hotelRepository->findById($id);
    }

    public function createHotel(array $data)
    {
        return $this->hotelRepository->create($data);
    }

    public function updateHotel($id, array $data)
    {
        return $this->hotelRepository->update($id, $data);
    }

    public function deleteHotel($id)
    {
        return $this->hotelRepository->delete($id);
    }
}
