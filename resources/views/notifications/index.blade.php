<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Noticaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-8">Mis noticaciones</h1>

                    @forelse ($notifications as $notification)
                        <div class="p-5 border border-gray-200 dark:border-gray-700 md:flex md:items-center md:justify-between">
                            <div>
                                <p>Tienes un nuevo candidato en: <span
                                        class="font-bold">{{ $notification->data['name_vacante'] }}</span></p>
                                <p><span class="font-bold text-sm">{{ $notification->created_at->diffForHumans() }}</span></p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="#"
                                class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs hover:bg-slate-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-gray-300 font-bold uppercase text-center flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>Candidatos
                            </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600 dark:text-gray-300 ">No hay notificaciones nuevas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
