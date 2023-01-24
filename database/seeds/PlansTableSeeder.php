<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            "plan_id" => "60673288f0d35",
            "plan_name"  => "Beginner",
            "plan_description"  => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price"  => "0",
            "validity"  => "31",
            "no_of_vcards"  => "1",
            "no_of_services"  => 5,
            "no_of_galleries"  => 5,
            "no_of_features"  => 5,
            "no_of_payments"  => 5,
            "personalized_link"  => "0",
            "hide_branding"  => "0",
            "free_setup"  => "0",
            "free_support"  => "0",
            "is_private"  => "0"
        ]);

        DB::table('plans')->insert([
            "plan_id" => "606732aa4fb58",
            "plan_name"  => "Intermediate",
            "plan_description"  => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price"  => "24",
            "validity"  => "31",
            "no_of_vcards"  => "5",
            "no_of_services"  => 10,
            "no_of_galleries"  => 10,
            "no_of_features"  => 10,
            "no_of_payments"  => 10,
            "personalized_link"  => "1",
            "recommended"  => "1",
            "hide_branding"  => "1",
            "free_setup"  => "0",
            "free_support"  => "0",
            "is_private"  => "0"
        ]);

        DB::table('plans')->insert([
            "plan_id" => "606732cb4ec9b",
            "plan_name"  => "Professional",
            "plan_description"  => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price"  => "48",
            "validity"  => "31",
            "no_of_vcards"  => "999",
            "no_of_services"  => 999,
            "no_of_galleries"  => 999,
            "no_of_features"  => 999,
            "no_of_payments"  => 999,
            "personalized_link"  => "1",
            "hide_branding"  => "1",
            "free_setup"  => "1",
            "free_support"  => "1",
            "is_private"  => "0"
        ]);
    }
}
