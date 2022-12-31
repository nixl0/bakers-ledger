@extends('base')

@props(['companies'])

@section('title')
    Предприятия
@endsection

@section('content')
    <div class="m-4 px-4">

        @can('operate', App\Models\Company::class)
            <x-create-entry href='/companies/create' />
        @endcan

        <div class="py-4">
            {{ $companies->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($companies as $company)
                <a href="/companies/{{ $company->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">
                        {{-- number --}}
                        <x-colout colname="номер" :goal="$company->number" />

                        {{-- legal title --}}
                        <x-colout colname="тип собственности" :goal="$company->legal->title" />

                        {{-- title --}}
                        <x-colout colname="название" :goal="$company->title" />

                        {{-- district title --}}
                        <x-colout colname="район" :goal="$company->district->title" />

                        {{-- district settlement title --}}
                        <x-colout colname="город" :goal="$company->district->settlement->title" />

                        {{-- since --}}
                        <x-colout colname="год основания" :goal="$company->since" />

                        {{-- phone --}}
                        <x-colout colname="телефон" :goal="$company->phone" />

                        {{-- email --}}
                        <x-colout colname="email" :goal="$company->email" />

                        {{-- owners --}}
                        <div class="flex">
                            <span class="text-right pr-1">
                                владельцы:
                            </span>
                            <span class="font-semibold truncate">
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
                            </span>
                        </div>

                        {{-- author --}}
                        <x-colout-author :entity="$company" />
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $companies->links() }}
        </div>
    </div>
@endsection
