<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->is_admin = false;
            $user->api_token = Str::random(60);
            $user->save();
        });


        factory(App\User::class, 1)->create()->each(function ($user) {
            $user->email = "admin@example.com";
            $user->password = Hash::make('123456');
            $user->api_token = Str::random(60);
            $user->save();
        });
    }
}
