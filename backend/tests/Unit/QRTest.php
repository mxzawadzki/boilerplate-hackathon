<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        $this->actingAs($user, 'api')->post("api/qry/generate", ['boundaries' => $boundaries])
            ->assertJson(["string"=>QR::first()->string]);

        $user->delete();

    }

    public function area(array $boundaries, $resourceAnswer)
    {

    }
}
