<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_local' => 'ar',
            'supported_currencies'=>['USD', 'LE', 'SD'],
            'default_currency'=>'USD',
            'default_timezone'  => 'Africa/cairo',
            'reviewes_enabled'  => true,
            'store_email'       => 'bigShow@admin.com',
            'search_engin'      => 'mysql',
            'local_shipping_cost'   => 0,
            'outer_shipping_cost'   => 0,
            'free_shipping_cost'    => 0,
            'store_name'            => 'BigShow',
            'free_shpping_lable'    => true,
            'local_lable'           => true,
            'outer_lable'           => true,
            'translatable' => [
                'store_name'    => 'BigShow Store',
                'free_shpping_lable'    => 'free shipping',
                'local_lable'   => 'local shipping',
                'outer_lable'   => 'outer shipping'
            ],
        ]);
    }
}
