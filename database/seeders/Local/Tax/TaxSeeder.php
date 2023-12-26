<?php

namespace Database\Seeders\Local\Tax;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $taxes = [
            [
                'name' => 'VAT',
                'rate' => 18,
            ],
            [
                'name' => 'VAT',
                'rate' => 20,
            ]
        ];

        foreach ($taxes as $tax) {
            Tax::create($tax);
        }
    }
}
