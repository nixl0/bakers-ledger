@extends('base')

@props(['districts'])

@section('title')
    Добавить магазин
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/shops" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="hidden">

            <h1 class="text-2xl font-bold text-center">Добавить магазин</h1>

            {{-- number --}}
            <x-input-box colname="номер" colname_form="number" input_value="{{ old('number') }}" />
            @error('number')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- title --}}
            <x-input-box colname="название" colname_form="title" input_value="{{ old('title') }}" />
            @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- district_id --}}
            <x-input-box-search colname="район" colname_form="district_id" input_value="{{ old('district_id') }}">
                @foreach ($districts as $district)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $district->id }}">{{ $district->title }}, {{ $district->settlement->title }}</li>
                @endforeach
            </x-input-box-search>
            @error('district_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- address --}}
            <x-input-box colname="адрес" colname_form="address" input_value="{{ old('address') }}" />
            @error('address')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- phone --}}
            <x-input-box colname="телефон" colname_form="phone" input_value="{{ old('phone') }}" />
            @error('phone')
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
