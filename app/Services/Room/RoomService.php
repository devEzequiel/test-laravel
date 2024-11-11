<?php

namespace App\Services\Room;

use App\Models\Room;
use App\Repositories\Room\RoomRepositoryInterface;

class RoomService
{
    protected $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAllRooms(array $filters = [])
    {
        return $this->roomRepository->getAll($filters);
    }

    public function findRoomById(int $id)
    {
        return $this->roomRepository->findById($id);
    }

    public function createRoom(array $data)
    {
        return $this->roomRepository->create($data);
    }

    public function updateRoom(int $id, array $data)
    {
        return $this->roomRepository->update($id, $data);
    }

    public function deleteRoom(int $id)
    {
        return $this->roomRepository->delete($id);
    }
}
