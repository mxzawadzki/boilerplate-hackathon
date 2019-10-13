<?php

namespace Tests\Unit;

use App\Http\Resources\MachineResource;
use App\Machine;
use App\User;
use Tests\TestCase;
use Str;

class MachinesInAreaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $place1 = factory(Machine::class,1)->create()->first();

        $place1->lat = 0.5;
        $place1->lng = 0.5;

        $place1->save;

        $place2 = factory(Machine::class,1)->create()->first();

        $place2->lat = -0.5;
        $place2->lng = -0.5;

        $place2->save;


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
        $user = factory(User::class)->create()->first();
        $this->actingAs($user, 'api')->post("api/miejsca/w-obszarze", ['boundaries' => $boundaries,'api_token'=>$user->api_token])
            ->assertJson($resourceAnswer->toArray(true));

        $user->delete();
    }
}
