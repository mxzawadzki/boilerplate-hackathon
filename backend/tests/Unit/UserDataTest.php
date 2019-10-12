<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class UserDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->userTest(0);
        $this->userTest(15);
    }

    public function userTest(int $points){
        $user = factory(User::class)->create();

        $user->score = $points;
        $user->save();

        $this->actingAs($user, 'api')->post("api/uzytkownik/dane")
            ->assertJson([
                "username" => $user->name,
                "email" => $user->email,
                "points" => $user->score
            ]);

        $user->delete();

    }
}
