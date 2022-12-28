@extends('base')

@props(['owners'])

@section('title')
    Владельцы
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Company::class)
            @include('components.create-entry', ['href' => '/owners/create'])
        @endcan


        <div class="py-4">
            {{ $owners->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($owners as $owner)
                <a href="/owners/{{ $owner->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        @include('components.colout', [
                            'entity' => $owner,
                            'colname' => 'фамилия',
                            'goal' => $owner->lastname,
                        ])
                        @include('components.colout', [
                            'entity' => $owner,
                            'colname' => 'имя',
                            'goal' => $owner->firstname,
                        ])
                        @include('components.colout', [
                            'entity' => $owner,
                            'colname' => 'отчество',
                            'goal' => $owner->patronym,
                        ])

                        {{-- companies --}}
                        <div class="flex">
                            <span class="text-right pr-1">
                                предприятия:
                            </span>
                            <span class="font-semibold truncate">
                                @foreach ($owner->companies as $company)
                                    <p>
                                        <span>{{ $company->legal->title }}</span>
                                        <span>{{ $company->title }}</span>
                                    </p>
                                @endforeach
                            </span>
                        </div>

                        @include('components.colout', [
                            'entity' => $owner,
                            'colname' => 'автор',
                            'goal' => $owner->user->name,
                            'author' => true,
                        ])
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $owners->links() }}
        </div>
    </div>
@endsection
