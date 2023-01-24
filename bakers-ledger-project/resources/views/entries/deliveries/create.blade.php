@extends('base')

@props(['shops'])

@section('title')
    Добавить поставку
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/deliveries" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="hidden">

            <h1 class="text-2xl font-bold text-center">Добавить поставку</h1>

            {{-- shop_id --}}
            <x-input-box-search colname="магазин" colname_form="shop_id" input_value="{{ old('shop_id') }}">
                @foreach ($shops as $shop)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $shop->id }}">{{ $shop->title }}, {{ $shop->number }}</li>
                @endforeach
            </x-input-box-search>
            @error('shop_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- date --}}
            <x-input-box colname="дата" colname_form="date" input_value="{{ old('date') }}" />
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
