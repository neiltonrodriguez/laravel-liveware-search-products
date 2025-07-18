<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Produto::factory()->count(30)->create();

        $produtos = [
            ['nome' => 'iPhone 12 Pro', 'categoria' => 'Celulares', 'marca' => 'Apple'],
            ['nome' => 'iPhone 13 Pro MAX', 'categoria' => 'Celulares', 'marca' => 'Apple'],
            ['nome' => 'iPhone 16', 'categoria' => 'Celulares', 'marca' => 'Apple'],
            ['nome' => 'Samsung S23', 'categoria' => 'Celulares', 'marca' => 'Samsung'],
            ['nome' => 'Smart TV 60" 4K Samsung', 'categoria' => 'TVs e Vídeo', 'marca' => 'Samsung'],
            ['nome' => 'Geladeira Frost Free Brastemp', 'categoria' => 'Eletrodomésticos', 'marca' => 'Brastemp'],
            ['nome' => 'Notebook Dell Inspiron 15', 'categoria' => 'Informática', 'marca' => 'Dell'],
            ['nome' => 'Macbooc M2', 'categoria' => 'Informática', 'marca' => 'Apple'],
            ['nome' => 'Notebook Pro i7', 'categoria' => 'Informática', 'marca' => 'Samsung'],
            ['nome' => 'Notebook Dell Latitude', 'categoria' => 'Informática', 'marca' => 'Dell'],
            ['nome' => 'Liquidificador Mondial Turbo', 'categoria' => 'Eletrodomésticos', 'marca' => 'Mondial'],
            ['nome' => 'Smartwatch Apple Watch SE', 'categoria' => 'Eletrônicos', 'marca' => 'Apple'],
            ['nome' => 'Monitor LG Ultrawide 29"', 'categoria' => 'Informática', 'marca' => 'LG'],
            ['nome' => 'Cafeteira Philips Walita', 'categoria' => 'Eletrodomésticos', 'marca' => 'Philips'],
            ['nome' => 'Fone Bluetooth Motorola', 'categoria' => 'Áudio', 'marca' => 'Motorola'],
            ['nome' => 'Escrivaninha Helena', 'categoria' => 'Móveis', 'marca' => 'Mondial'],
        ];

        foreach ($produtos as $data) {
            Produto::create([
                'nome' => $data['nome'],
                'categoria_id' => Categoria::where('nome', $data['categoria'])->first()->id,
                'marca_id' => Marca::where('nome', $data['marca'])->first()->id,
            ]);
        }
    }
}
