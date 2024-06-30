{{-- <input type="checkbox" {!! $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) !!}> --}}
<div class="flex rounded-md shadow-sm">
    <input {{ $attributes }}
        type="checkbox"
        class="block transition duration-150 ease-in-out border-gray-300 form-checkbox sm:text-sm sm:leading-5"
    />
</div>
