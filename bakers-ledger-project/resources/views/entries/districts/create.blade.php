@extends('base')

@props(['settlements'])

@section('title')
    Добавить район
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/districts" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="hidden">

            <h1 class="text-2xl font-bold text-center">Добавить район</h1>

            {{-- title --}}
            <x-input-box colname="название" colname_form="title" input_value="{{ old('title') }}" />
            @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- settlement_id --}}
            <x-input-box-search colname="город" colname_form="settlement_id" input_value="{{ old('settlement_id') }}">
                @foreach ($settlements as $settlement)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $settlement->id }}">{{ $settlement->title }}</li>
                @endforeach
            </x-input-box-search>
            @error('settlement_id')
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
