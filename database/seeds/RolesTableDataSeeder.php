<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $data = [
            [
                'name' => 'super_admin',
                'description' => 'Can Edit Everythings'
            ],
            [
                'name' => 'admin_article',
                'description' => 'Can Edit Article'
            ],
            [
                'name' => 'admin_advert',
                'description' => 'Can Edit Advertisement'
            ],

        ];

        foreach ( $data as  $datas )
        {
            Role::create($datas);
        }
    }
}
