@extends('base')

@props(['owners'])

@section('title')
    Владельцы
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Company::class)
            <x-create-entry href='/owners/create' />
        @endcan


        <div class="py-4">
            {{ $owners->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($owners as $owner)
                <a href="/owners/{{ $owner->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- lastname --}}
                        <x-colout colname="фамилия" :goal="$owner->lastname" />

                        {{-- firstname --}}
                        <x-colout colname="имя" :goal="$owner->firstname" />

                        {{-- patronym --}}
                        <x-colout colname="отчество" :goal="$owner->patronym" />

                        {{-- companies --}}
                        <div class="flex">
                            <span class="text-right pr-1">
                                предприятия:
                            </span>
                            <span class="font-semibold truncate">
                                @if (count($owner->companies))
                                    <p>
                                        @foreach ($owner->companies as $company)
                                            <p>
                                                <span>{{ $company->legal->title }}</span>
                                                <span>{{ $company->title }}</span>
                                            </p>
                                        @endforeach
                                    </p>
                                @else
                                    <p class="text-red-500">
                                        * компании не указаны *
                                    </p>
                                @endif
                            </span>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $owners->links() }}
        </div>
    </div>
@endsection
