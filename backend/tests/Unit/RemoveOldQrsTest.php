<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Qr;
use App\Tasks\RemoveOldQrsTask;

class RemoveOldQrsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $minutes = 5;

        $count = Qr::count();
        $date = Carbon::now();

        $qr1 = Qr::create([
            'string'=>"fdajskfhdaslfdas",
            "points"=>1,
        ]);

        $qr1->created_at = $date->toDateTimeString();
        $qr1->save();

        $date->subMinutes($minutes);

        $qr2 = Qr::create([
            'string'=>"fdajskfhdaslfdas",
            "points"=>1,
        ]);

        $qr2->created_at = $date->toDateTimeString();
        $qr2->save();

        RemoveOldQrsTask::remove($minutes);

        $this->assertTrue($count +1 === Qr::count());

        $qr1->delete();

    }
}
