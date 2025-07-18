<?php

namespace Tests\Feature;

use App\Livewire\BuscaProdutos;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Livewire\Livewire;
use Tests\TestCase;

class BuscaProdutoTest extends TestCase
{
    public function test_filtra_por_nome()
    {
        Produto::factory()->create(['nome' => 'TV LG']);
        Produto::factory()->create(['nome' => 'Notebook Dell']);

        Livewire::test(BuscaProdutos::class)
            ->set('nome', 'TV')
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertDontSee('Notebook Dell');
    }

    public function test_filtra_por_categorias()
    {
        $catEletronicos = Categoria::firstOrCreate(['nome' => 'Eletrônicos']);
        $catMoveis = Categoria::firstOrCreate(['nome' => 'Móveis']);

        Produto::factory()->create(['nome' => 'TV LG', 'categoria_id' => $catEletronicos->id]);
        Produto::factory()->create(['nome' => 'Sofá', 'categoria_id' => $catMoveis->id]);

        Livewire::test(BuscaProdutos::class)
            ->set('categoriasSelecionadas', [$catEletronicos->id])
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertDontSee('Sofá');

        Livewire::test(BuscaProdutos::class)
            ->set('categoriasSelecionadas', [$catEletronicos->id, $catMoveis->id])
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertSee('Sofá');
    }

    public function test_filtra_por_marcas()
    {
        $marcaLG = Marca::firstOrCreate(['nome' => 'LG']);
        $marcaSamsung = Marca::firstOrCreate(['nome' => 'Samsung']);

        Produto::factory()->create(['nome' => 'TV LG', 'marca_id' => $marcaLG->id]);
        Produto::factory()->create(['nome' => 'TV Samsung', 'marca_id' => $marcaSamsung->id]);

        Livewire::test(BuscaProdutos::class)
            ->set('marcasSelecionadas', [$marcaLG->id])
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertDontSee('TV Samsung');

        Livewire::test(BuscaProdutos::class)
            ->set('marcasSelecionadas', [$marcaLG->id, $marcaSamsung->id])
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertSee('TV Samsung');
    }

    public function test_filtra_por_nome_categoria_e_marca()
    {
        $catEletronicos = Categoria::firstOrCreate(['nome' => 'Eletrônicos']);
        $marcaLG = Marca::firstOrCreate(['nome' => 'LG']);
        $marcaSamsung = Marca::firstOrCreate(['nome' => 'Samsung']);
        Produto::factory()->create([
            'nome' => 'TV LG',
            'categoria_id' => $catEletronicos->id,
            'marca_id' => $marcaLG->id
        ]);

        Produto::factory()->create([
            'nome' => 'Geladeira Samsung',
            'categoria_id' => $catEletronicos->id,
            'marca_id' => $marcaSamsung->id 
        ]);

        Livewire::test(BuscaProdutos::class)
            ->set('nome', 'TV')
            ->set('categoriasSelecionadas', [$catEletronicos->id])
            ->set('marcasSelecionadas', [$marcaLG->id])
            ->call('buscar')
            ->assertSee('TV LG')
            ->assertDontSee('Geladeira Samsung');
    }

    public function test_filtros_persistem_apos_refresh()
    {
        $catEletronicos = Categoria::firstOrCreate(['nome' => 'Eletrônicos']);
        $marcaLG = Marca::firstOrCreate(['nome' => 'LG']);

        $component = Livewire::test(BuscaProdutos::class)
            ->set('nome', 'TV')
            ->set('categoriasSelecionadas', [$catEletronicos->id])
            ->set('marcasSelecionadas', [$marcaLG->id])
            ->call('buscar');

        $component->assertSet('nome', 'TV')
            ->assertSet('categoriasSelecionadas', [$catEletronicos->id])
            ->assertSet('marcasSelecionadas', [$marcaLG->id]);
    }

    public function test_limpa_filtros()
    {
        Produto::factory()->create(['nome' => 'TV LG']);

        Livewire::test(BuscaProdutos::class)
            ->set('nome', 'TV')
            ->set('categoriasSelecionadas', [1])
            ->set('marcasSelecionadas', [1])
            ->call('limpar')
            ->assertSet('nome', '')
            ->assertSet('categoriasSelecionadas', [])
            ->assertSet('marcasSelecionadas', []);
    }
}
