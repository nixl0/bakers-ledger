@extends('base')

@props(['shops', 'trademarks'])

@section('title')
    Добавить поставку
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/deliveries" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <h1 class="text-2xl font-bold text-center">Добавить поставку</h1>

            {{-- shop --}}
            <div class="flex items-center space-x-2">
                <label for="shop_id" class="">
                    магазин
                </label>
                <input list="shops" name="shop_id" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('shop_id') }}">
                <datalist id="shops">
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}" label="{{ $shop->title }}" />
                    @endforeach
                </datalist>
            </div>
            @error('shop_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- trademark --}}
            <div class="flex items-center space-x-2">
                <label for="trademark_id" class="">
                    торговая марка
                </label>
                <input list="trademarks" name="trademark_id" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('trademark_id') }}">
                <datalist id="trademarks">
                    @foreach ($trademarks as $trademark)
                        <option value="{{ $trademark->id }}" label="{{ $trademark->title }}" />
                    @endforeach
                </datalist>
            </div>
            @error('trademark_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- price --}}
            <div class="flex items-center space-x-2">
                <label for="price" class="">
                    цена
                </label>
                <input type="text" name="price" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('price') }}">
            </div>
            @error('price')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- quantity --}}
            <div class="flex items-center space-x-2">
                <label for="quantity" class="">
                    количество
                </label>
                <input type="text" name="quantity" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('quantity') }}">
            </div>
            @error('quantity')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- date --}}
            <div class="flex items-center space-x-2">
                <label for="date" class="">
                    дата
                </label>
                <input type="date" name="date" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('date') }}">
            </div>
            @error('date')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            <button type="submit" class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                Добавить
            </button>
        </form>
    </div>
</div>
@endsection
