{{-- In work, do what you enjoy. --}}

{{-- use this attr wire:submit.prevent to send the info --}}

<form class="md:w-1/2 space-y-5" wire:submit.prevent='createVacancy'>
    <div>
        <x-input-label for="title" :value="__('Titulo vacante')" />

        {{-- To bind data to the logic file you must use wire:model --}}
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Titulo vacante" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="salary" :value="__('Salario mensual')" />
        <select id="salary" wire:model="salary"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>

            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="category" :value="__('Categoria')" />
        <select id="category" wire:model="category"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Empresa: ej. Netflix, Uber, Apple" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="deadline" :value="__('Fecha de cierre de la oferta')" />
        <x-text-input id="deadline" class="block mt-1 w-full" type="date" wire:model="deadline"
            :value="old('deadline')" />
        <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Descripcion')" />
        <textarea id="description"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            wire:model="description"
            placeholder="Descripcion general del puesto, experiencia, area, conocimientos, habilidades"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*" />
        {{-- Show image preview --}}
        {{-- In livewire we have two way data binding that allow send and receive information --}}
        {{-- 1. Check if there are a image upload --}}
        {{-- 2. With the image upload we hava a method temporaryURL that allow the image in a url while that will be charged --}}
        @if ($image)
            <div class="my-5 w-80 mx-auto">
                <p>Imagen:</p>
                <img src="{{ $image->temporaryURL() }}" alt="">
            </div>
        @endif

        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <div class="flex items-center justify-between mt-4">
        <x-link :href="route('vacantes.index')">
            Cancelar
        </x-link>

        <x-primary-button class="ml-4">
            {{ __('Registrate') }}
        </x-primary-button>
    </div>
</form>
