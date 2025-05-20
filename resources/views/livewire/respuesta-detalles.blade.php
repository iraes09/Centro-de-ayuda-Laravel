<div>
    @if ($respuesta)
        <!-- Fondo semitransparente -->
        <div class="fixed inset-0 bg-black bg-opacity-30 dark:bg-opacity-50 z-40 flex items-center justify-center">
            <!-- Modal centrado -->
            <div class="w-full max-w-xl bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg z-50 text-black dark:text-white">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Detalles de la respuesta</h2>
                    <button wire:click="cerrar" class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 text-2xl leading-none">&times;</button>
                </div>

                <div class="space-y-2 text-sm">
                    <p><strong>Título:</strong> {{ $respuesta->pregunta->titulo ?? 'Pregunta eliminada' }}</p>
                    <p><strong>Texto:</strong> {{ $respuesta->pregunta->texto ?? '-' }}</p>
                    <p><strong>Detalles:</strong> {{ $respuesta->pregunta->detalles ?? '-' }}</p>
                    <p><strong>Respuesta:</strong> {{ $respuesta->respuesta }}</p>
                    <p><strong>Fecha:</strong> {{ $respuesta->created_at->format('Y-m-d H:i') }}</p>
                </div>
                <div class="mt-4 border-t border-gray-300 dark:border-gray-600 pt-4">
                    <h3 class="font-semibold mb-2">Valorar respuesta</h3>

                    @if ($yaValorado)
                        <p class="text-green-600 dark:text-green-400 text-sm">Ya has valorado esta respuesta.</p>
                    @else
                        <div class="flex items-center gap-2">
                            <select wire:model="valorSeleccionado"
                                    class="border rounded px-2 py-1 bg-white dark:bg-gray-700 text-black dark:text-white border-gray-300 dark:border-gray-600">
                                <option value="">Selecciona una puntuación</option>
                                @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button wire:click="aplicarValoracion"
                                    class="bg-blue-500 text-black dark:text-white px-3 py-1 rounded hover:bg-blue-600">
                                Valorar
                            </button>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @endif
</div>