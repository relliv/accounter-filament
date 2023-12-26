<?php

namespace Database\Seeders\Local\Currency;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $currencies = [
            [
                'name' => 'TRY',
                'code' => 'TRY',
                'rate' => 1,
                'precision' => 2,
                'symbol' => '₺',
                'decimal_mark' => ',',
                'thousands_separator' => '.',
            ],
            [
                'name' => 'USD',
                'code' => 'USD',
                'rate' => 29,
                'precision' => 2,
                'symbol' => '$',
                'decimal_mark' => '.',
                'thousands_separator' => ',',
            ]
        ];

        foreach ($currencies as $currency) {
            Tax::create($currency);
        }
    }
}
