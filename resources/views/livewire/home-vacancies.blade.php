<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <livewire:filter-vacancies />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold md:text-4xl px-3 text-2xl text-gray-700 dark:text-gray-200 mb-12">
                Nuestras vacantes disponibles
            </h3>
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacancies as $vacancy)
                    <div class="md:justify-between md:flex md:items-center py-5">
                        <div class="md:flex-1 md:mb-0 mb-3">
                            <a href="{{ route('vacantes.show', $vacancy) }}"
                                class="text-3xl font-bold text-gray-600 dark:text-gray-300">{{ $vacancy->title }}
                            </a>
                            <p class="text-base text-gray-500 dark:text-gray-300">{{ $vacancy->company }}</p>
                            <p class="text-base text-gray-500 dark:text-gray-300">{{ $vacancy->category->category }}</p>
                            <p class="text-base text-gray-500 dark:text-gray-300">{{ $vacancy->salary->salary }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300">Ultimo dia para aplicar: <span
                                    class="font-semibold">{{ $vacancy->deadline->format('d/m/Y') }}</span></p>

                        </div>
                        <div>
                            <a href="{{ route('vacantes.show', $vacancy) }}"
                                class="bg-slate-800 py-2 px-4 gap-2 rounded-lg text-white text-xs hover:bg-slate-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-gray-300 font-bold uppercase text-center flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-400">No hay candidatos
                        aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
