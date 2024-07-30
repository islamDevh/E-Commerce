<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table("settings")->insert([
            "name"  => $faker->name(),
            "description"  => $faker->name(),
            "whatsapp"  => $faker->name(),
            "twitter"  => $faker->name(),
            "instagram"  => $faker->name(),
            "logo"  => $faker->name(),
            "youtube"  => $faker->name(),
            "facebook" => $faker->safeEmail,
            "email" => $faker->safeEmail,
            "phone" => $faker->phoneNumber,
        ]);
    }



}