<?php

use App\Machines;
use Illuminate\Database\Seeder;

class MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = file_get_contents("../front/src/multiPoints.json");

        $points = json_decode($json, true)['points'];


        foreach ($points as $point) {
            $properties = $point['properties'];
            $coordinates = $point['geometry']["coordinates"];

            Machines::create([
                "name" => $properties['name'],
                "amenity" => $properties['amenity'],
                "popup_content" => $properties['popupContent'],
                "lat" => $coordinates[0],
                "lng" => $coordinates[1],
                "address" => "Temp address",
                "open_week_at" => "open_week_at",
                "open_weekend_at" => "open_weekend_at",
                "api_token" => Str::random(60),
            ]);
        }

        Machines::create([
            "name" => "Startberry",
            "amenity" => "2 piętro",
            "popup_content" => "Za darmo to biorę",
            "lat" => 52.246803,
            "lng" => 21.063160,
            "address" => "Grochowska 306/308",
            "open_week_at" => "00:00 - 24:00",
            "open_weekend_at" => "00:00 - 24:00",
            "api_token" => "jf4WSD36OfhcN4114csvphqeYDeBcvKknZTv927uudBck5Cklnusw8FexI6t",
        ]);
    }
}
