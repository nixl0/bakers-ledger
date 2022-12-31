@extends('base')

@props(['owners', 'companies'])

@section('title')
    Добавить владельца
@endsection

@section('content')
    <div class="m-4 px-4">

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <form action="/owners" method="POST" class="w-2/3 flex flex-col space-y-6">
                @csrf

                <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="hidden">

                <h1 class="text-2xl font-bold text-center">Добавить владельца</h1>

                {{-- lastname --}}
                <x-input-box colname="фамилия" colname_form="lastname" input_value="{{ old('lastname') }}" />
                @error('lastname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- firstname --}}
                <x-input-box colname="имя" colname_form="firstname" input_value="{{ old('firstname') }}" />
                @error('firstname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- patronym --}}
                <x-input-box colname="отчество" colname_form="patronym" input_value="{{ old('patronym') }}" />
                @error('patronym')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- TODO companies multiselect --}}

                <button type="submit"
                    class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                    Добавить
                </button>
            </form>
        </div>
    </div>
@endsection
