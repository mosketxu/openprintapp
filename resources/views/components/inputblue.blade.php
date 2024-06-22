@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm py-1 font-light w-full border-blue-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
