<?php

namespace Database\Seeders;

use App\Models\fertilizer\fertilizer_area;
use Illuminate\Database\Seeder;

class FertilizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding here manually since its value is same
        fertilizer_area::create([
            'name' => 'Hector (हेक्टर)',
            'equal_to_kattha' => '29.53'
        ]);

        fertilizer_area::create([
            'name' => 'Acre (एकर)',
            'equal_to_kattha' => '11.95'
        ]);

        fertilizer_area::create([
            'name' => 'Ropani (रोपनी)',
            'equal_to_kattha' => '1.5'
        ]);

        fertilizer_area::create([
            'name' => 'Kattha (कट्ठा)',
            'equal_to_kattha' => '1'
        ]);

        fertilizer_area::create([
            'name' => 'Bigha (बिघा)',
            'equal_to_kattha' => '20'
        ]);

        fertilizer_area::create([
            'name' => 'Square Meter (वर्ग मिटर)',
            'equal_to_kattha' => '0.0029531628373989'
        ]);

        fertilizer_area::create([
            'name' => 'Dhur (धुर)',
            'equal_to_kattha' => '0.05'
        ]);
    }
}
