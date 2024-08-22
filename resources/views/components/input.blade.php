@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 py-0.5 text-sm focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
