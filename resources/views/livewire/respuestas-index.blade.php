<div class="p-4">
    <h1 class="text-2xl font-bold mb-6 text-center text-black dark:text-white">Top Respuestas</h1>

    <div class="flex flex-col lg:flex-row gap-6 justify-center">
        <!-- Tabla por Entradas -->
        <div class="w-full lg:w-1/2">
            <h2 class="text-xl font-semibold text-center mb-2 text-black dark:text-white">Más vistas</h2>
            <table class="table-auto w-full border border-gray-300 dark:border-gray-600 text-center bg-white dark:bg-gray-800 text-black dark:text-white rounded">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Pregunta</th>
                        <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuestasPorEntradas as $respuesta)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->pregunta->titulo ?? 'Eliminada' }}</td>
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->respuesta }}</td>
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">
                                <button wire:click="verDetalles({{ $respuesta->id }})"
                                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600">
                                    Ver
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabla por Valoración -->
        <div class="w-full lg:w-1/2">
            <h2 class="text-xl font-semibold text-center mb-2 text-black dark:text-white">Mejor valoradas</h2>
            <table class="table-auto w-full border border-gray-300 dark:border-gray-600 text-center bg-white dark:bg-gray-800 text-black dark:text-white rounded">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Pregunta</th>
                        <th class="border px-4 py-2 border-gray-300 dark:border-gray-600">Respuesta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($respuestasPorValoracion as $respuesta)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->pregunta->titulo ?? 'Eliminada' }}</td>
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $respuesta->respuesta }}</td>
                            <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">
                                <button wire:click="verDetalles({{ $respuesta->id }})"
                                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600">
                                    Ver
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>