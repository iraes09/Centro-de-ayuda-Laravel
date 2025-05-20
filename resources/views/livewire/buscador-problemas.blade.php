<div class="p-4">

    <div class="flex space-x-2 mb-4">
        <input type="text" wire:model.defer="busqueda"
               class="border rounded px-4 py-2 w-full bg-white dark:bg-gray-700 text-black dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
               placeholder="Buscar por título...">
        <button wire:click="buscar"
                class="bg-blue-500 text-black dark:text-white px-4 py-2 rounded hover:bg-blue-600">
            Buscar
        </button>
    </div>

    @if (!empty($resultados))
        <table class="table-auto w-full border border-gray-300 dark:border-gray-600 text-center bg-white dark:bg-gray-800 text-black dark:text-white rounded">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Título</th>
                    <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Respuesta</th>
                    <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $respuesta)
                    <tr>
                        <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->pregunta->titulo ?? 'Pregunta eliminada' }}</td>
                        <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->respuesta }}</td>
                        <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">
                            <button wire:click="verDetalles({{ $respuesta->id }})"
                                class="bg-indigo-500 text-black dark:text-white px-3 py-1 rounded hover:bg-indigo-600">
                                Ver detalles
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($busqueda !== '')
        <p class="text-gray-500 dark:text-gray-400 mt-4">No se encontraron resultados.</p>
    @endif
</div>