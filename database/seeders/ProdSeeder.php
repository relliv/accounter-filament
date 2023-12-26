<?php

namespace Database\Seeders;

use Database\Seeders\Local\Tax\TaxSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Local\User\DefaultUserSeeder;

class ProdSeeder extends Seeder
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
            TaxSeeder::class,
        ]);
    }
}
