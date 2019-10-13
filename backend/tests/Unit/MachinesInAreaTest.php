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
        $machine1 = factory(Machine::class,1)->create()->first();

        $machine1->lat = 0.500000;
        $machine1->lng = 0.500000;

        $machine1->save();

        $machine2 = factory(Machine::class,1)->create()->first();

        $machine2->lat = -0.500000;
        $machine2->lng = -0.500000;

        $machine2->save();


        $this->area([[0, 0], [1, 1]], MachineResource::collection(collect([$machine1])));
        $this->area([[0, 0], [0.4, 0.4]], MachineResource::collection(collect([])));
        $this->area([[0, 0], [0.5, 0.5]], MachineResource::collection(collect([$machine1])));

        $this->area([[-1, -1], [0, 0]], MachineResource::collection(collect([$machine2])));
        $this->area([[-0.4, -0.4], [0, 0]], MachineResource::collection(collect([])));
        $this->area([[-0.5, -0.5], [0, 0]], MachineResource::collection(collect([$machine2])));


        $this->area([[-0.5, -0.5], [0.5, 0.5]], MachineResource::collection(collect([$machine1, $machine2])));

        $machine1->delete();
        $machine2->delete();

    }

    public function area(array $boundaries, $resourceAnswer)
    {
        $user = factory(User::class)->create()->first();
        $this->actingAs($user, 'api')->post("api/miejsca/w-obszarze", ['boundaries' => $boundaries,'api_token'=>$user->api_token])
            ->assertJson($resourceAnswer->toArray(true));

        $user->delete();
    }
}
