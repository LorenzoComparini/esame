<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class landSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lands = [
            [
                "city" => "Verona",
                "img" => "https://www.agentiimmobiliari.online/wp-content/uploads/2019/10/TerrenoAgricolo.jpg",
                "size" => 300,
                "cadastral_sheet" => "000000000",
                "cadastral_map" => "000000000",
                "cadastral_parcel" => "000000000",
                "ground_type" => "Argilloso",
                "watering_type" => "Pozzo",
                "offer_type" => "Affitto",
                "price" => 5000,
                "available" => 1,
                "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.",
            ],
        ];

        DB::table('lands')->insert($lands);
    }
}
