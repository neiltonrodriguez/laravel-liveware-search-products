<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BuscaProdutos extends Component
{
    use WithPagination;

    #[Url(as: 'nome', keep: true)]
    public string $nome = '';

    #[Url(as: 'categorias', keep: true)]
    public array $categoriasSelecionadas = [];

    #[Url(as: 'marcas', keep: true)]
    public array $marcasSelecionadas = [];

    public bool $pesquisarAgora = false;

    public function buscar()
    {
        $this->pesquisarAgora = true;
        $this->resetPage();
    }

    public function limpar()
    {
        $this->reset(['nome', 'categoriasSelecionadas', 'marcasSelecionadas', 'pesquisarAgora']);
        return redirect()->to('/');
    }

    public function render()
    {
        $query = Produto::query()->with(['categoria', 'marca']);

        if ($this->pesquisarAgora) {
            if (!empty($this->nome)) {
                $query->where('nome', 'like', '%' . $this->nome . '%');
            }

            if (!empty($this->categoriasSelecionadas)) {
                $query->whereIn('categoria_id', $this->categoriasSelecionadas);
            }

            if (!empty($this->marcasSelecionadas)) {
                $query->whereIn('marca_id', $this->marcasSelecionadas);
            }
        }

        return view('livewire.busca-produtos', [
            'produtos' => $query->paginate(10),
            'categorias' => Categoria::orderBy('nome')->get(),
            'marcas' => Marca::orderBy('nome')->get(),
        ]);
    }
}
