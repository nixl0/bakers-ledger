@extends('base')

@props(['owner'])

@section('title')
    {{ $owner->lastname . ' ' . $owner->firstname }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        <x-back-button />

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>фамилия:</p>
                <p>имя:</p>
                <p>отчество:</p>
                <p>предприятия:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $owner->lastname }}</p>
                <p>{{ $owner->firstname }}</p>
                <p>{{ $owner->patronym }}</p>

                @if (count($owner->companies))
                    <p>
                        @foreach ($owner->companies as $company)
                            {{ $company->title }},
                        @endforeach
                    </p>
                @else
                    <p class="text-red-500">
                        * предприятия не указаны *
                    </p>
                @endif

            </div>
        </div>

        @can('operate', App\Models\Owner::class)
            <x-edit-delete-entry href="/owners/{{ $owner->id }}" />
        @endcan
    </div>
@endsection
