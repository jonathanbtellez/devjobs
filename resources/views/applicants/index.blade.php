<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-8">Candidatos vacante: {{ $vacancy->title }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacancy->Applicants as $applicant)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                            {{ $applicant->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-800 dark:text-gray-200">
                                            {{ $applicant->user->email }}
                                        </p>
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                            Dia de postulacion: <span
                                                class="font-light">{{ $applicant->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    <div class="mt-5 md:mt-0">
                                        <a
                                          href="{{ asset('storage/cv/'.$applicant->cv) }}"
                                          class="bg-slate-800 py-2 px-4 gap-2 rounded-lg text-white text-xs hover:bg-slate-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-gray-300 font-bold uppercase text-center flex items-center justify-center"
                                          target="_blank"
                                          rel="noreferrer noopener"
                                          >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                              </svg>
                                              Ver curriculum
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-400">No hay candidatos
                                    aun</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
