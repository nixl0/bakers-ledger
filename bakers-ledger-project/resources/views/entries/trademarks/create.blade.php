@extends('base')

@props(['companies', 'grades'])

@section('title')
    Добавить торговую марку
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/trademarks" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <input type="text" name="user_id" value="{{ auth()->user()->id }}" class="invisible">

            <h1 class="text-2xl font-bold text-center">Добавить торговую марку</h1>

            {{-- title --}}
            <div class="flex items-center space-x-2">
                <label for="title" class="">
                    название
                </label>
                <input type="text" name="title" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('title') }}">
            </div>
            @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- company --}}
            <div class="flex items-center space-x-2">
                <label for="company_id" class="">
                    предприятие
                </label>
                <input list="companies" name="company_id" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('company_id') }}">
                <datalist id="companies">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" label="{{ $company->legal->title }} {{ $company->title }}" />
                    @endforeach
                </datalist>
            </div>
            @error('company_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- grade --}}
            <div class="flex items-center space-x-2">
                <label for="grade_id" class="">
                    сорт муки
                </label>
                <input list="grades" name="grade_id" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('grade_id') }}">
                <datalist id="grades">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" label="{{ $grade->title }}" />
                    @endforeach
                </datalist>
            </div>
            @error('grade_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- ingredients --}}
            <div class="flex items-center space-x-2">
                <label for="ingredients" class="">
                    ингредиенты
                </label>
                <input type="text" multiline name="ingredients" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('ingredients') }}">
            </div>
            @error('ingredients')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- weight --}}
            <div class="flex items-center space-x-2">
                <label for="weight" class="">
                    вес
                </label>
                <input type="number" name="weight" class="w-full p-4 text-gray-900 border rounded-md" value="{{ old('weight') }}">
            </div>
            @error('weight')
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
