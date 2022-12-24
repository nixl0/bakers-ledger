@extends('base')

@props(['districts', 'legals', 'owners'])

@section('title')
    Добавить предприятие
@endsection

@section('content')
    <div class="m-4 px-4">

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <form action="/companies" method="POST" class="w-2/3 flex flex-col space-y-6">
                @csrf

                <h1 class="text-2xl font-bold text-center">Добавить предприятие</h1>

                {{-- number --}}
                <div class="flex items-center space-x-2">
                    <label for="number" class="">
                        номер
                    </label>
                    <input type="text" name="number" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('number') }}">
                </div>
                @error('number')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- legal --}}
                <div class="flex items-center space-x-2">
                    <label for="legal_id" class="">
                        тип собственности
                    </label>
                    <input list="legals" name="legal_id" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('legal_id') }}">
                    <datalist id="legals">
                        @foreach ($legals as $legal)
                            <option value="{{ $legal->id }}" label="{{ $legal->title }}" />
                        @endforeach
                    </datalist>
                </div>
                @error('legal_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- title --}}
                <div class="flex items-center space-x-2">
                    <label for="title" class="">
                        название
                    </label>
                    <input type="text" name="title" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('title') }}">
                </div>
                @error('title')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- district --}}
                <div class="flex items-center space-x-2">
                    <label for="district_id" class="">
                        район
                    </label>
                    <input list="districts" name="district_id" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('district_id') }}">
                    <datalist id="districts">
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}"
                                label="{{ $district->title }}, {{ $district->settlement->title }}" />
                        @endforeach
                    </datalist>
                </div>
                @error('district_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- since --}}
                <div class="flex items-center space-x-2">
                    <label for="since" class="">
                        год основания
                    </label>
                    <input type="number" name="since" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('since') }}">
                </div>
                @error('since')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- phone --}}
                <div class="flex items-center space-x-2">
                    <label for="phone" class="">
                        телефон
                    </label>
                    <input type="text" name="phone" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('phone') }}">
                </div>
                @error('phone')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- email --}}
                <div class="flex items-center space-x-2">
                    <label for="email" class="">
                        email
                    </label>
                    <input type="email" name="email" class="w-full p-4 text-gray-900 border rounded-md"
                        value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- // TODO owners multiselect --}}

                <button type="submit"
                    class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                    Добавить
                </button>
            </form>
        </div>
    </div>
@endsection
