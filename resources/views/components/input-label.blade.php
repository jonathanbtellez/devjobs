@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-500 font-semibold dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
