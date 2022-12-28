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

                <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="invisible">

                <h1 class="text-2xl font-bold text-center">Добавить владельца</h1>

                {{-- lastname --}}
                <div class="flex items-center space-x-2">
                    <label for="lastname" class="">
                        фамилия
                    </label>
                    <input type="text" name="lastname" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('lastname') }}">
                </div>
                @error('lastname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- firstname --}}
                <div class="flex items-center space-x-2">
                    <label for="firstname" class="">
                        имя
                    </label>
                    <input type="text" name="firstname" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('firstname') }}">
                </div>
                @error('firstname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- patronym --}}
                <div class="flex items-center space-x-2">
                    <label for="patronym" class="">
                        отчество
                    </label>
                    <input type="text" name="patronym" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('patronym') }}">
                </div>
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
