@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-8 py-1 my-2 text-base font-bold leading-5 rounded-full bg-teal-300 text-white focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-sm leading-5 font-medium text-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
