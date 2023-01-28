<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => '609c03880ee47',
            'role_id' => '1',
            'name' => 'GoBiz',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'auth_type' => 'Email',
        ]);
    }
}
