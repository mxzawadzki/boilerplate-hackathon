<?php

namespace Tests\Unit;

use App\Machine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Qr;

class QRTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class,1)->create()->first();
//        dd(factory(Machine::class));
        $machine = factory(Machine::class,1)->create()->first();

        $this->actingAs($machine, 'api')->post("api/qry/wygeneruj", ['points' => 13,'api_token'=>$machine->api_token])
            ->assertJson(["string"=>Qr::first()->string]);

        $this->assertTrue(Qr::first()->points === 13);


        $this->actingAs($user, 'api')->post("api/qry/zweryfikuj", ['string' => Qr::first()->string])
            ->assertJson(["valid"=>true,"points"=>Qr::first()->points]);


        $this->actingAs($user, 'api')->post("api/qry/zweryfikuj", ['string' => "fdasfjdasfjdashfkdas"])
            ->assertJson(["valid"=>false,"points"=>-1]);

        Qr::first()->delete();

        $user->delete();
        $machine->delete();

    }
}
