<?php

use App\Place;
use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
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

            Place::create([
                'name' => $properties['name'],
                'amenity' => $properties['amenity'],
                'popup_content' => $properties['popupContent'],
                "lat" => $coordinates[0],
                "lng" => $coordinates[1],
                "address" => "Temp address",
                "open_week_at" => "open_week_at",
                "open_weekend_at" => "open_weekend_at",
            ]);
        }
    }
}
