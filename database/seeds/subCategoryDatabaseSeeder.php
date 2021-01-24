<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class subCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create([
            'parient_id' => $this->getRandomOrder()
        ]);
    }
    private function getRandomOrder(){
       $patent_id =  \App\Models\Category::inRandomOrder()->first();
       return $patent_id;
    }
}
