@extends('base')

@props(['trademark', 'companies', 'grades'])

@section('title')
    Изменить торговую марку
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/trademarks/{{ $trademark->id }}" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold text-center">Изменить торговую марку</h1>

            {{-- title --}}
            <x-input-box colname="название" colname_form="title" input_value="{{ $trademark->title }}" />
            @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- company_id --}}
            <x-input-box-search colname="предприятия" colname_form="company_id" input_value="{{ $trademark->company->id }}">
                @foreach ($companies as $company)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $company->id }}">{{ $company->title }}</li>
                @endforeach
            </x-input-box-search>
            @error('company_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- grade_id --}}
            <x-input-box-search colname="район" colname_form="grade_id" input_value="{{ $trademark->grade->id }}">
                @foreach ($grades as $grade)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $grade->id }}">{{ $grade->title }}</li>
                @endforeach
            </x-input-box-search>
            @error('grade_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- ingredients --}}
            <x-input-box colname="ингредиенты" colname_form="ingredients" input_value="{{ $trademark->ingredients }}" />
            @error('ingredients')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- weight --}}
            <x-input-box colname="вес" colname_form="weight" input_value="{{ $trademark->weight }}" type="number" />
            @error('weight')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- price --}}
            <x-input-box colname="цена" colname_form="price" input_value="{{ $trademark->price }}" type="number" />
            @error('price')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            <button type="submit" class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                Изменить
            </button>
        </form>
    </div>
</div>
@endsection
