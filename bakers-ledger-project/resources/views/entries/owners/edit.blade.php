@extends('base')

@props(['owner', 'companies'])

@section('title')
    Изменить владельца
@endsection

@section('content')
    <div class="m-4 px-4">

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <form action="/owners/{{ $owner->id }}" method="POST" class="w-2/3 flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <h1 class="text-2xl font-bold text-center">Изменить владельца</h1>

                {{-- lastname --}}
                <x-input-box colname="фамилия" colname_form="lastname" input_value="{{ $owner->lastname }}" />
                @error('lastname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- firstname --}}
                <x-input-box colname="имя" colname_form="firstname" input_value="{{ $owner->firstname }}" />
                @error('firstname')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- patronym --}}
                <x-input-box colname="отчество" colname_form="patronym" input_value="{{ $owner->patronym }}" />
                @error('patronym')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- companies multiselect --}}
                @php
                    $companiesArr = [];
                    foreach ($owner->companies as $company) {
                        array_push($companiesArr, $company->id);
                    }

                    $companiesStr = implode(',', $companiesArr);
                @endphp
                <x-input-box-multiple colname="предприятия" colname_form="company_id" input_value="{{ $companiesStr }}">
                    @foreach ($companies as $company)
                        <li class="ledger-multiple-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                            value="{{ $company->id }}" title="{{ $company->legal->title }}, {{ $company->title }}">
                            {{ $company->legal->title }}, {{ $company->title }}</li>
                    @endforeach
                </x-input-box-multiple>
                @error('company_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit"
                    class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                    Изменить
                </button>
            </form>
        </div>
    </div>
@endsection
