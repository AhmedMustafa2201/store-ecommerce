<?php

// namespace Database\Seeders;

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
        $this->call(SettingDatabaseSeed::class);
        $this->call(AdminDatabaseSeeder::class);
        $this->call(CategoryDatabaseSeeder::class);
        $this->call(subCategoryDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
    }
}
