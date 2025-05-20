<div class="max-w-xl mx-auto p-4 bg-white dark:bg-gray-800 rounded shadow text-black dark:text-white">
    @if (session()->has('message'))
        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Título</label>
            <input type="text" wire:model="titulo"
                   class="w-full border rounded px-3 py-2 bg-white dark:bg-gray-700 text-black dark:text-white border-gray-300 dark:border-gray-600">
            @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Texto</label>
            <textarea wire:model="texto"
                      class="w-full border rounded px-3 py-2 bg-white dark:bg-gray-700 text-black dark:text-white border-gray-300 dark:border-gray-600"></textarea>
            @error('texto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Detalles</label>
            <textarea wire:model="detalles"
                      class="w-full border rounded px-3 py-2 bg-white dark:bg-gray-700 text-black dark:text-white border-gray-300 dark:border-gray-600"></textarea>
            @error('detalles') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-black dark:text-white px-4 py-2 rounded hover:bg-blue-600">
            Guardar
        </button>
    </form>
</div>