@extends('base')

@props(['companies'])

@section('title')
    Предприятия
@endsection

@section('content')
<div class="m-4 px-4">

    @include('components.create-entry', ['href' => '/companies/create'])

    <div class="py-4">
        {{ $companies->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($companies as $company)
            <a href="/companies/{{ $company->id }}">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">
                    @include('components.colout', ['entity' => $company, 'colname' => 'номер', 'goal' => $company->number])
                    @include('components.colout', ['entity' => $company, 'colname' => 'тип собственности', 'goal' => $company->legal->title])
                    @include('components.colout', ['entity' => $company, 'colname' => 'название', 'goal' => $company->title])
                    @include('components.colout', ['entity' => $company, 'colname' => 'район', 'goal' => $company->district->title])
                    @include('components.colout', ['entity' => $company, 'colname' => 'город', 'goal' => $company->district->settlement->title])
                    @include('components.colout', ['entity' => $company, 'colname' => 'год основания', 'goal' => $company->since])
                    @include('components.colout', ['entity' => $company, 'colname' => 'email', 'goal' => $company->email])

                    {{-- owners --}}
                    <div class="flex">
                        <span class="text-right pr-1">
                            владельцы:
                        </span>
                        <span class="font-semibold truncate">
                            @foreach ($company->owners as $owner)
                                <p>{{ $owner->lastname }} {{ $owner->firstname }}</p>
                            @endforeach
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $companies->links() }}
    </div>
</div>
@endsection
