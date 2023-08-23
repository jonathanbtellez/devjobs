<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="bg-gray-100 dark:bg-gray-900 p-7">
        <h2 class="text-2xl md:text-4xl text-gray-600 dark:text-gray-300 text-center font-extrabold my-5">Buscar y
            Filtrar Vacantes</h2>

        <div class="max-w-7xl mx-auto">
            <form wire:submit.prevent='filterForm'>
                <div class="md:grid md:grid-cols-3 gap-5">
                    <div class="mb-5">
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-400 uppercase font-bold "
                            for="term">Término de Búsqueda
                        </label>
                        <input id="term" wire:model='term' type="text"
                            placeholder="Buscar por Término: ej. Laravel"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" />
                    </div>

                    <div class="mb-5">
                        <label
                            class="block mb-1 text-sm text-gray-700 dark:text-gray-400 uppercase font-bold">Categoría</label>
                        <select class="border-gray-300 p-2 w-full" wire:model='category'>
                            <option>--Seleccione--</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-400 uppercase font-bold">Salario
                            Mensual</label>
                        <select class="border-gray-300 p-2 w-full" wire:model='salary'>
                            <option>-- Seleccione --</option>
                            @foreach ($salaries as $salary)
                                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <input type="submit"
                        class="bg-slate-800 py-2 px-4 gap-2 rounded-lg text-white text-sm hover:bg-slate-700 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-gray-300 font-bold uppercase text-center flex items-center justify-center"
                        value="Buscar" />
                </div>
            </form>
        </div>
    </div>
</div>
