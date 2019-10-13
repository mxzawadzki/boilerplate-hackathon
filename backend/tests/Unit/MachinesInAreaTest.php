<?php

namespace Tests\Unit;

use App\Http\Resources\MachineResource;
use App\Machine;
use App\User;
use Tests\TestCase;

class MachinesInAreaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $place1 = Machine::create([
            "popup_content" => "popup_content",
            "amenity" => "amenity",
            "name" => "Punkt 1",
            "address" => "Adres 1",
            "open_week_at" => '473298342',
            "open_weekend_at" => '32141242',
            "lat" => 0.500000,
            "lng" => 0.500000,
        ]);

        $place2 = Machine::create([
            "popup_content" => "popup_content",
            "amenity" => "amenity",
            "name" => "Punkt 2",
            "address" => "Adres 2",
            "open_week_at" => '473298342',
            "open_weekend_at" => '32141242',
            "lat" => -0.500000,
            "lng" => -0.500000,
        ]);


        $this->area([[0, 0], [1, 1]], MachineResource::collection(collect([$place1])));
        $this->area([[0, 0], [0.4, 0.4]], MachineResource::collection(collect([])));
        $this->area([[0, 0], [0.5, 0.5]], MachineResource::collection(collect([$place1])));

        $this->area([[-1, -1], [0, 0]], MachineResource::collection(collect([$place2])));
        $this->area([[-0.4, -0.4], [0, 0]], MachineResource::collection(collect([])));
        $this->area([[-0.5, -0.5], [0, 0]], MachineResource::collection(collect([$place2])));


        $this->area([[-0.5, -0.5], [0.5, 0.5]], MachineResource::collection(collect([$place1, $place2])));

        $place1->delete();
        $place2->delete();

    }

    public function area(array $boundaries, $resourceAnswer)
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api')->post("api/miejsca/w-obszarze", ['boundaries' => $boundaries])
            ->assertJson($resourceAnswer->toArray(true));

        $user->delete();
    }
}
