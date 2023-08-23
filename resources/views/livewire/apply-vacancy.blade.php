<div class="bg-gray-100 dark:bg-gray-700 p-5 mt-10 flex flex-col items-center justify-center">
    {{-- Success is as dangerous as failure. --}}
    <h3 class="text-2xl text-center font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('message'))
        <div
            class="uppercase border rounded-lg border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm text-center">
            {{ session('message') }}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='apply'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o hoja de vida')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf" />

                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <x-primary-button class="ml-4">
                    {{ __('Aplicar') }}
                </x-primary-button>
            </div>
        </form>
    @endif
</div>
