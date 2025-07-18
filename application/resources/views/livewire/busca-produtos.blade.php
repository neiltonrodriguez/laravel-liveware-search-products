<div class="p-6 max-w-7xl mx-auto">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="md:col-span-1 bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Filtro</h1>

            <div class="mb-6">
                <label for="nome-produto" class="block text-sm font-medium text-gray-700 mb-2">Nome do Produto:</label>
                <input
                    id="nome-produto"
                    wire:model="nome"
                    type="text"
                    placeholder="Ex: Smart TV, Notebook..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <hr class="my-6 border-gray-200"> 

            <fieldset class="mb-6">
                <legend class="block text-lg font-semibold text-gray-800 mb-3">Categorias:</legend>
                <div class="flex flex-col gap-2 max-h-60 overflow-y-auto pr-2 custom-scrollbar"> 
                    @foreach ($categorias as $categoria)
                    <label class="inline-flex items-center gap-2 text-gray-700 cursor-pointer hover:text-blue-600 transition-colors">
                        <input type="checkbox" wire:model="categoriasSelecionadas" value="{{ $categoria->id }}" class="form-checkbox h-4 w-4 text-blue-600 rounded focus:ring-blue-500 accent-blue-500">
                        <span>{{ $categoria->nome }}</span>
                    </label>
                    @endforeach
                </div>
            </fieldset>

            <hr class="my-6 border-gray-200">
            <fieldset class="mb-6"> 
                <legend class="block text-lg font-semibold text-gray-800 mb-3">Marcas:</legend>
                <div class="flex flex-col gap-2 max-h-60 overflow-y-auto pr-2 custom-scrollbar"> 
                    @foreach ($marcas as $marca)
                    <label class="inline-flex items-center gap-2 text-gray-700 cursor-pointer hover:text-purple-600 transition-colors">
                        <input type="checkbox" wire:model="marcasSelecionadas" value="{{ $marca->id }}" class="form-checkbox h-4 w-4 text-purple-600 rounded focus:ring-purple-500 accent-purple-500">
                        <span>{{ $marca->nome }}</span>
                    </label>
                    @endforeach
                </div>
            </fieldset>
            <div class="mt-4 flex flex-col gap-2">
                <button
                    wire:click="buscar"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-lg transition-colors duration-200">
                    Aplicar Filtros
                </button>
                <button
                    wire:click="limpar"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md shadow-lg transition-colors duration-200">
                    Limpar Filtros
                </button>
            </div>
        </div>

        <div class="md:col-span-3 bg-white rounded-lg shadow-md p-6 relative">

            <div wire:loading class="absolute inset-0 bg-white/70 flex items-center justify-center z-10 rounded-lg">
                <div class="flex items-center space-x-2">
                    <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                    <span class="text-lg text-gray-600 font-medium">Carregando produtos...</span>
                </div>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center justify-between">
                Resultados
                <span class="text-base text-gray-500">Total: {{ $produtos->total() }}</span>
            </h2>

            @if ($produtos->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($produtos as $produto)
                <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-4 flex flex-col items-center justify-between text-center min-h-[150px] transform transition-all duration-300 hover:scale-103 hover:shadow-lg hover:border-blue-300 cursor-pointer"> 
                <img src="{{ asset('img/img.png') }}" alt="Imagem do Produto" class="w-30 border  border-gray-100 rounded-md object-contain mb-4 rounded-md bg-white p-2">   
                <div class="text-lg font-bold text-gray-900 mb-2">{{ $produto->nome }}</div>
                    <div class="text-sm text-gray-600">
                        Categoria: <span class="font-medium">{{ $produto->categoria?->nome ?? 'N/A' }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        Marca: <span class="font-medium">{{ $produto->marca?->nome ?? 'N/A' }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $produtos->links() }}
            </div>
            @else
            <div class="text-gray-500 text-center py-10">Nenhum produto encontrado com os filtros aplicados.</div>
            @endif
        </div>
    </div>
</div>