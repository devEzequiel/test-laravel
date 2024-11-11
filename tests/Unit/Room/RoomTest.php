<?php

namespace Tests\Unit;

use App\Models\Hotel;
use App\Models\Room;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_create_room_request()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel de Teste',
            'address' => 'Rua Teste 123',
            'city' => 'Bogotah',
            'state' => 'Roraima',
            'zip_code' => '12325-371',
            'website' => 'https://www.hotelteste.com.br',
        ]);

        $response = $this->post(route('rooms.store'), [
            'hotel_id' => $hotel->id,
            'name' => 'Quarto Luxo',
            'description' => 'Quarto confortável',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('rooms', [
            'name' => 'Quarto Luxo',
            'description' => 'Quarto confortável',
            'hotel_id' => $hotel->id,
        ]);
    }

    /** @test */
    public function it_shows_validation_errors_on_create()
    {
        $response = $this->post(route('rooms.store'), [
            'name' => 'Quarto 3 estrelas',
            'description' => 'Descrição do quarto padrão',
        ]);

        $response->assertSessionHasErrors('hotel_id');
    }

    /** @test */
    public function it_can_create_a_room()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel de Luxo',
            'address' => 'Rua Luxo 123',
            'city' => 'Paratininga',
            'state' => 'Pensilvanya',
            'zip_code' => '28733-323',
            'website' => 'https://www.hoteldeluxo.com.br',
        ]);

        $roomData = [
            'hotel_id' => $hotel->id,
            'name' => 'Quarto Premium',
            'description' => 'Quarto com banheira',
        ];

        $room = Room::create($roomData);

        $this->assertDatabaseHas('rooms', [
            'name' => 'Quarto Premium',
            'description' => 'Quarto com banheira',
            'hotel_id' => $hotel->id,
        ]);

        $this->assertEquals($room->name, 'Quarto Premium');
    }

    /** @test */
    public function it_can_find_room_by_name()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel',
            'address' => 'Rua 1232',
            'city' => 'Cidade',
            'state' => 'Estado',
            'zip_code' => '98237-232',
            'website' => 'https://www.hotel.com.br',
        ]);

        Room::create([
            'hotel_id' => $hotel->id,
            'name' => 'Quarto 6 estrelas',
            'description' => 'Quarto com vista pro Mar',
        ]);

        $searchResults = Room::where('name', 'Quarto 6 estrelas')->get();

        $this->assertCount(1, $searchResults);
        $this->assertEquals('Quarto 6 estrelas', $searchResults->first()->name);
    }

}
