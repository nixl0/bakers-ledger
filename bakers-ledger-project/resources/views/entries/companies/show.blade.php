@extends('base')

@props(['company'])

@section('title')
    {{ $company->title }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        @include('components.back-button')

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>номер:</p>
                <p>тип собственности:</p>
                <p>название:</p>
                <p>район:</p>
                <p>город:</p>
                <p>год основания:</p>
                <p>телефон:</p>
                <p>email:</p>
                <p>владельцы:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $company->number }}</p>
                <p>{{ $company->legal->title }}</p>
                <p>{{ $company->title }}</p>
                <p>{{ $company->district->title }}</p>
                <p>{{ $company->district->settlement->title }}</p>
                <p>{{ $company->since }}</p>
                <p>{{ $company->phone }}</p>
                <p>{{ $company->email }}</p>

                @if (count($company->owners))
                    <p>
                        @foreach ($company->owners as $owner)
                            {{ $owner->lastname }} {{ $owner->firstname }},
                        @endforeach
                    </p>
                @else
                    <p class="text-red-500">
                        * владельцы не указаны *
                    </p>
                @endif

                <p class="text-slate-300">{{ $company->user->name }}</p>
            </div>
        </div>

        @can('operate', App\Models\Company::class)
            @include('components.edit-delete-buttons', ['href' => '/companies/' . $company->id])
        @endcan
    </div>
@endsection
