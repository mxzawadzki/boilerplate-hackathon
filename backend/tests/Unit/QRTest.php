<?php

namespace Tests\Unit;

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
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api')->post("api/qry/wygeneruj", ['points' => 13])->assertTrue(Qr::first()->points === 13)
            ->assertJson(["string"=>Qr::first()->string]);

        Qr::first()->delete();

        $user->delete();

    }

    public function area(array $boundaries, $resourceAnswer)
    {

    }
}
