@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm py-1 font-light w-full bg-transparent border-0 hover:bg-gray-100 hover:cursor-pointer hover:border-0 focus:border-0 focus:border-none']) !!}>
