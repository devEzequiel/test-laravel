<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\CreateHotelRequest;
use App\Http\Requests\Hotel\FilterHotelRequest;
use App\Models\Hotel;
use App\Services\Hotel\HotelService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    protected HotelService $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function index(FilterHotelRequest $request): JsonResponse
    {
        try {
            $filters = $request->validated();
            $hotels = $this->hotelService->getAllHotels($filters);

            return $this->responseOk($hotels);
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $hotel = $this->hotelService->findHotelById($id);

            return $this->responseOk($hotel);
        } catch (Exception $e) {
            return $this->responseNotFound($e->getMessage());
        }
    }

    public function store(CreateHotelRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->hotelService->createHotel($data);

            return $this->responseCreated('Hotel created successfully');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->hotelService->createHotel($data);

            return $this->responseCreated('Hotel updated successfully');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $hotel = $this->hotelService->deleteHotel($id);

            return $this->responseAccepted($hotel);
        } catch (Exception $e) {
            return $this->responseNotFound($e->getMessage());
        }
    }
}
