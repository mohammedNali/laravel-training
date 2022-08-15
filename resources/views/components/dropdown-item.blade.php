@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';

    if ($active) $classes .= ' bg-blue-500 text-white ';
@endphp

<a {{
    $attributes(['class' => $classes])
    }}
>

{{--    <a ></a>--}}
    {{ $slot }}
</a>
