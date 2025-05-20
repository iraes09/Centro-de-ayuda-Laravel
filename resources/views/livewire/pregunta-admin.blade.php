<div class="w-full max-w-4xl mx-auto">
    <div class="overflow-x-auto">
        <table class="w-full bg-white dark:bg-gray-800 shadow rounded text-black dark:text-white">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600">Título</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600">Texto</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600">Detalles</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600">Respuesta</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600"></th>
                    <th class="px-4 py-2 text-left border-b border-gray-300 dark:border-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($preguntas as $pregunta)
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="px-4 py-2">{{ $pregunta->titulo }}</td>
                        <td class="px-4 py-2">{{ $pregunta->texto }}</td>
                        <td class="px-4 py-2">{{ $pregunta->detalles }}</td>
                        <td class="px-4 py-2">
                            @if ($pregunta->respuesta)
                                <span class="text-gray-800 dark:text-gray-200">{{ $pregunta->respuesta->respuesta }}</span>
                            @else
                                <input type="text" wire:model.defer="respuestas.{{ $pregunta->id }}"
                                       class="w-full border rounded px-2 py-1 bg-white dark:bg-gray-700 text-black dark:text-white border-gray-300 dark:border-gray-600" />
                                @error("respuestas.$pregunta->id")
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                                @if (session()->has("mensaje_$pregunta->id"))
                                    <div class="text-green-600 text-sm">{{ session("mensaje_$pregunta->id") }}</div>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if (!$pregunta->respuesta)
                                <button wire:click="enviarRespuesta({{ $pregunta->id }})"
                                    class="bg-blue-500 text-black dark:text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Enviar
                                </button>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <button wire:click="eliminarPregunta({{ $pregunta->id }})"
                                    class="bg-red-500 text-black dark:text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('¿Estás seguro de eliminar esta pregunta?')">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>