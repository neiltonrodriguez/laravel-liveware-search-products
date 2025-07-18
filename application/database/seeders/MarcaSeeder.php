<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Samsung',
            'Apple',
            'LG',
            'Brastemp',
            'Mondial',
            'Dell',
            'Philips',
            'Motorola',
        ];

        foreach ($marcas as $nome) {
            Marca::firstOrCreate(['nome' => $nome]);
        }
    }
}
