<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRoomRequest;
use App\Http\Requests\Room\FilterRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Services\Room\RoomService;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected RoomService $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index(FilterRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $filters = $request->validated();
            $rooms = $this->roomService->getAllRooms($filters);

            return $this->responseOk($rooms);
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $room = $this->roomService->findRoomById($id);

            return $this->responseOk($room);
        } catch (Exception $e) {
            return $this->responseNotFound($e->getMessage());
        }
    }

    public function store(CreateRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $this->roomService->createRoom($data);

            return $this->responseCreated('Room created successfully');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function update(UpdateRoomRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $this->roomService->updateRoom($id, $data);

            return $this->responseCreated('Room updated successfully');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->roomService->deleteRoom($id);

            return $this->responseAccepted();
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }
}
