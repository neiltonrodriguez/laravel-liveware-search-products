<div class="p-6 max-w-5xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Filtro de Produtos</h1>

        <div class="mb-4">
            <input
                wire:model.lazy="nome"
                type="text"
                placeholder="Buscar por nome do produto..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <fieldset>
                <legend class="block text-sm font-medium text-gray-700 mb-1">Categorias:</legend>
                <div class="flex flex-col gap-2 max-h-40 overflow-y-auto">
                    @foreach ($categorias as $categoria)
                    <label class="inline-flex items-center gap-2 text-gray-700">
                        <input type="checkbox" wire:model="categoriasSelecionadas" value="{{ $categoria->id }}" class="accent-blue-500">
                        <span>{{ $categoria->nome }}</span>
                    </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset>
                <legend class="block text-sm font-medium text-gray-700 mb-1">Marcas:</legend>
                <div class="flex flex-col gap-2 max-h-40 overflow-y-auto">
                    @foreach ($marcas as $marca)
                    <label class="inline-flex items-center gap-2 text-gray-700">
                        <input type="checkbox" wire:model="marcasSelecionadas" value="{{ $marca->id }}" class="accent-purple-500">
                        <span>{{ $marca->nome }}</span>
                    </label>
                    @endforeach
                </div>
            </fieldset>
        </div>

        <div class="mt-4 flex justify-end">
            <button
                wire:click="buscar"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow-sm transition mr-2">
                Pesquisar
            </button>
            <button
                wire:click="limpar"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md shadow-sm transition">
                Limpar filtros
            </button>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 relative">

        <div wire:loading class="absolute inset-0 bg-white/70 flex items-center justify-center z-10 rounded-lg">
            <div class="flex items-center space-x-2">
                <svg class="animate-spin h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
                <span class="text-sm text-gray-600">Carregando produtos...</span>
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center justify-between">
            Resultados
            <span class="text-sm text-gray-500">Total: {{ $produtos->total() }}</span>
        </h2>

        @if ($produtos->count())
        <ul class="divide-y divide-gray-200">
            @foreach ($produtos as $produto)
            <li class="py-3">
                <div class="text-gray-900 font-medium">{{ $produto->nome }}</div>
                <div class="text-sm text-gray-600">
                    Categoria: <span class="font-medium">{{ $produto->categoria?->nome ?? 'Sem categoria' }}</span> |
                    Marca: <span class="font-medium">{{ $produto->marca?->nome ?? 'Sem marca' }}</span>
                </div>
            </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $produtos->links() }}
        </div>
        @else
        <div class="text-gray-500">Nenhum produto encontrado com os filtros aplicados.</div>
        @endif
    </div>
</div>