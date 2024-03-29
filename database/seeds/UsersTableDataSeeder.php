<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@admin.com',
            'password' => bcrypt('MariBermain123'),
        ]);
    }
}
