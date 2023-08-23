<div class="p-10">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-200 my-3">
            {{ $vacancy->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 p-4 bg-gray-50 dark:bg-gray-700 my-10">
            <p class="font-bold text-sm uppercase my-3">Empresa: <span
                    class="normal-case font-normal">{{ $vacancy->company }}</span></p>
            <p class="font-bold text-sm uppercase my-3">Publicacion abierta hasta: <span
                    class="normal-case font-normal">{{ $vacancy->deadline->toFormattedDateString() }}</span></p>
            <p class="font-bold text-sm uppercase my-3">Categoria: <span
                    class="normal-case font-normal">{{ $vacancy->category->category }}</span></p>
            <p class="font-bold text-sm uppercase my-3">Sueldo: <span
                    class="normal-case font-normal">{{ $vacancy->salary->salary }}</span></p>
        </div>
        <div class="md:grid md:grid-cols-6 gap-5">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}"
                    alt="Image del puesto {{ $vacancy->title }}">
            </div>
            <div class="md:col-span-4 mt-3 md:mt-0">
                <h2 class="text-2xl font-bold mb-5">Descripcion del puesto</h2>
                <p>{{ $vacancy->description }}</p>
            </div>
        </div>

        @guest
            <div class="mt-5 bg-gray-50 dark:bg-gray-700 border border-dashed text-center py-5">
                <p>
                    Desea postularse a esta vacante ? <a href="{{ route('register') }}"
                        class="font-bold text-indigo-600 hover:text-indigo-400 dark:text-indigo-400 dark:hover:text-indigo-500">
                        Obten una cuenta y aplica a esta y otras vacantes</a>
                </p>
            </div>
        @endguest
        {{-- Can directive verify if an user pass a directive --}}
        {{-- Cannot directive verify if an user not pass a directive --}}

        @cannot('create', App\Models\Vacante::class)
            <livewire:apply-vacancy :vacante="$vacancy" />
        @endcannot
    </div>
</div>
