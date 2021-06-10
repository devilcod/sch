<div wire:ignore>
    @props(['options' => "{dateFormat:'Y-m-d', altFormat:'F j, Y', altInput:true, }"])
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        data-input
        {{ $attributes->merge(['class' => 'block w-full disabled:bg-gray-200 p-2 border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5', 'disabled' => 'disabled']) }}
    />

</div>
