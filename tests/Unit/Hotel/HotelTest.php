<?php

namespace Tests\Unit;

use App\Models\Hotel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_hotel()
    {
        $hotelData = [
            'name' => 'Hotel Holland',
            'address' => 'Rua Guará 28',
            'city' => 'Brasília',
            'state' => 'Distrito Federal',
            'zip_code' => '54800-212',
            'website' => 'https://www.hotelholland.com.br',
        ];

        $hotel = Hotel::create($hotelData);

        $this->assertDatabaseHas('hotels', [
            'name' => 'Hotel Holland',
            'address' => 'Rua Guará 28',
            'city' => 'Brasília',
            'state' => 'Distrito Federal',
            'zip_code' => '54800-212',
            'website' => 'https://www.hotelholland.com.br',
        ]);

        $this->assertEquals($hotel->name, 'Hotel Holland');
        $this->assertEquals($hotel->city, 'Brasília');
    }

    /** @test */
    public function it_can_find_hotel()
    {
        $hotelData = [
            'name' => 'Hotel Holland',
            'address' => 'Rua Guará 28',
            'city' => 'Brasília',
            'state' => 'Distrito Federal',
            'zip_code' => '54800-212',
            'website' => 'https://www.hotelholland.com.br',
        ];

        Hotel::create($hotelData);

        $searchResults = Hotel::where('city', 'Brasília')->get();

        $this->assertCount(1, $searchResults);
        $this->assertEquals('Hotel Holland', $searchResults->first()->name);

    }

    /** @test */
    public function it_can_update_a_hotel()
    {
        $hotel = Hotel::create([
            'name' => 'Hotel Holland',
            'address' => 'Rua Guará 28',
            'city' => 'Brasília',
            'state' => 'Distrito Federal',
            'zip_code' => '54800-212',
            'website' => 'https://www.hotelholland.com.br',
        ]);

        $hotel->update([
            'name' => 'Hotel Germania',
            'address' => 'Rua Planaltina 29',
        ]);

        $this->assertDatabaseHas('hotels', [
            'name' => 'Hotel Germania',
            'address' => 'Rua Planaltina 29',
        ]);

        $this->assertEquals('Hotel Germania', $hotel->fresh()->name);
    }
}
