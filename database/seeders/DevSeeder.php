<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Local\Tax\TaxSeeder;
use Database\Seeders\Local\User\UserSeeder;
use Database\Seeders\Local\User\DefaultUserSeeder;
use Database\Seeders\Local\Currency\CurrencySeeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DefaultUserSeeder::class,
            UserSeeder::class,
            TaxSeeder::class,
            CurrencySeeder::class,
        ]);
    }
}
