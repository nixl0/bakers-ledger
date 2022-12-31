@props(['colname', 'colname_form', 'input_value'])

<div class="flex items-center space-x-2">
    <label for="{{ $colname_form }}" class="">
        {{ $colname }}
    </label>
    <input type="text" name="{{ $colname_form }}" class="w-full p-4 text-gray-900 border rounded-md" value="{{ $input_value }}">
</div>
