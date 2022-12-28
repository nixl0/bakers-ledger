@extends('base')

@props(['owner'])

@section('title')
    {{ $owner->lastname . ' ' . $owner->firstname }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        @include('components.back-button')

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>фамилия:</p>
                <p>имя:</p>
                <p>отчество:</p>
                <p>предприятия:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $owner->lastname }}</p>
                <p>{{ $owner->firstname }}</p>
                <p>{{ $owner->patronym }}</p>

                @if (count($owner->companies))
                    <p>
                        @foreach ($owner->companies as $company)
                            {{ $company->title }}
                        @endforeach
                    </p>
                @else
                    <p class="text-red-500">
                        * предприятия не указаны *
                    </p>
                @endif

                <p class="text-slate-300">{{ $owner->user->name }}</p>
            </div>
        </div>

        @can('operate', App\Models\Owner::class)
            @include('components.edit-delete-buttons', ['href' => '/owners/' . $owner->id])
        @endcan
    </div>
@endsection
