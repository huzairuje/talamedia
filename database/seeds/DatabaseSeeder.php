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
        $this->call(UsersTableDataSeeder::class);
        $this->call(RolesTableDataSeeder::class);
        $this->call(MenusTableDataSeeder::class);
        $this->call(UsersRolesTableDataSeeder::class);
        $this->call(MenusRolesTableDataSeeder::class);
        $this->call(ArticleCategoriesTableDataSeeder::class);
        $this->call(ArticleTagsTableDataSeeder::class);
    }
}
