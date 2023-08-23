<div>
    <div>
        {{-- If your happiness depends on money, you will never be happy with yourself. --}}
        @forelse ($vacancies as $vacancy)
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:flex md:justify-between md:items-center mb-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="space-y-7">
                        <a href="{{route('vacantes.show', $vacancy) }}" class="text-xl font-bold">
                            {{ $vacancy->title }}
                        </a>
                        <p class="text-sm text-gray-600 dark:text-gray-200 font-bold">{{ $vacancy->company }}</p>
                        <p class="text-sm text-gray-400 ">Abierta hasta: {{ $vacancy->deadline->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 items-stretch p-5 justify-end md:flex-row">
                    <a href="{{route('applicants.index', $vacancy)}}"
                        class="bg-slate-800 py-2 px-4 gap-2 rounded-lg text-white text-xs hover:bg-slate-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-gray-300 font-bold uppercase text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        @php
                           $applicants = $vacancy->applicants->count()
                        @endphp
                            </svg>{{$applicants === 1 ? 'Candidato' : 'Candidatos'}} {{$applicants}}
                    </a>
                    <a href="{{ route('vacantes.edit', $vacancy) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs hover:bg-blue-700 font-bold uppercase text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>

                        Editar
                    </a>
                    <button wire:click="$emit('onDelete',{{$vacancy->id}})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs hover:bg-red-500 font-bold uppercase text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>

                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg md:flex md:justify-center md:items-center mb-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="space-y-7">
                        <p class="text-sm text-gray-600 dark:text-gray-200 font-bold text-center">No hay vacantes que
                            mostrar</p>
                    </div>
                </div>
        @endforelse
    </div>
    <div class="mt-10 px-3">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('onDelete', vacancyId =>{
            Swal.fire({
                title: 'Eliminar vacante',
                text: "Esta seguro una vez eliminada no se pude recuperar la vacante!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar la vacante !',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteVacancy', vacancyId)
                    Swal.fire(
                        'Eliminada!',
                        'La vacante se ha eliminado.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
