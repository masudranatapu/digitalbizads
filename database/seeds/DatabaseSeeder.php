<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlansTableSeeder::class);
        $this->call(GatewayTableSeeder::class);
	    $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(BusinessCardsTableSeeder::class);
        $this->call(PageSeeder::class);
    }
}
