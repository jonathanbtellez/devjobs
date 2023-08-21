<div>
    @php
        $classes = "text-sm text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
    @endphp
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    

    {{-- $attributes is a special variable of components that read the attributes pass whe the component is called 
        <x-link :href="route('password.request')"> method merge that the attribute receive and integrate this to the attributes given as a parameter
        --}}
    <a {{ $attributes->merge(['class'=>$classes]) }}> 
        {{ $slot }}
    </a>

    {{-- to use a other value when the component is called <x-link :link="route('password.request')"> you need expecify this in the array of attributes to merge $attributes->merge(['class'=>$classes, 'href'=>$link])--}}
    {{-- <a {{ $attributes->merge(['class'=>$classes, 'href'=>$link]) }}> 
        {{ $slot }}
    </a> --}}
</div>