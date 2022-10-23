@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-start px-6 py-2 mt-4 text-gray-100 bg-indigo-700 bg-opacity-30'
            : 'flex items-start px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-75';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
