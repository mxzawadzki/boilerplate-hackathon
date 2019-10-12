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
            $user->save();
        });

        factory(App\User::class, 50)->create()->each(function ($user) {
        });

        factory(App\User::class, 1)->create()->each(function ($user) {
            $user->email = "admin@example.com";
            $user->save();
        });
    }
}
