@extends('base')

@props(['users', 'companies'])

@section('title')
    Добавить пользователя
@endsection

@section('content')
    <div class="m-4 px-4">

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <form action="/users" method="POST" class="w-2/3 flex flex-col space-y-6">
                @csrf

                <h1 class="text-2xl font-bold text-center">Добавить пользователя</h1>

                {{-- name --}}
                <div class="flex items-center space-x-2">
                    <label for="name" class="">
                        юзернейм
                    </label>
                    <input type="text" name="name" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('name') }}">
                </div>
                @error('name')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- last_name --}}
                <div class="flex items-center space-x-2">
                    <label for="last_name" class="">
                        фамилия
                    </label>
                    <input type="text" name="last_name" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('last_name') }}">
                </div>
                @error('last_name')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- first_name --}}
                <div class="flex items-center space-x-2">
                    <label for="first_name" class="">
                        имя
                    </label>
                    <input type="text" name="first_name" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('first_name') }}">
                </div>
                @error('first_name')
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

                {{-- email --}}
                <div class="flex items-center space-x-2">
                    <label for="email" class="">
                        email
                    </label>
                    <input type="text" name="email" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- password --}}
                <div class="flex items-center space-x-2">
                    <label for="password" class="">
                        пароль
                    </label>
                    <input type="password" name="password" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('password') }}">
                </div>
                @error('password')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit"
                    class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                    Добавить
                </button>
            </form>
        </div>
    </div>
@endsection
