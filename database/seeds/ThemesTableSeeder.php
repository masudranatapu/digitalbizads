<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06caa",
            "theme_name" => "Modern vCard Light",
            "theme_description" => "vCard",
            "theme_thumbnail" => "modern-light.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06vta",
            "theme_name" => "Modern vCard Dark",
            "theme_description" => "vCard",
            "theme_thumbnail" => "modern-dark.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06cth",
            "theme_name" => "Classic vCard Light",
            "theme_description" => "vCard",
            "theme_thumbnail" => "classic-light.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06vyw",
            "theme_name" => "Classic vCard Dark",
            "theme_description" => "vCard",
            "theme_thumbnail" => "classic-dark.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06ctw",
            "theme_name" => "Metro vCard Light",
            "theme_description" => "vCard",
            "theme_thumbnail" => "metro-light.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06vhd",
            "theme_name" => "Metro vCard Dark",
            "theme_description" => "vCard",
            "theme_thumbnail" => "metro-dark.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06hty",
            "theme_name" => "Modern Store Light",
            "theme_description" => "WhatsApp Store",
            "theme_thumbnail" => "modern-store-light.png",
            "theme_price" => "Free"
        ]);

        DB::table('themes')->insert([
            "theme_id" => "7ccc432a06hju",
            "theme_name" => "Modern Store Dark",
            "theme_description" => "WhatsApp Store",
            "theme_thumbnail" => "modern-store-dark.png",
            "theme_price" => "Free"
        ]);
    }
}
