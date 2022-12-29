@extends('base')

@props(['district'])

@section('title')
    {{ $district->title }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        <x-back-button />

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>название:</p>
                <p>город:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $district->title }}</p>
                <p>{{ $district->settlement->title }}</p>
                <p class="text-slate-300">{{ $district->user->name }}</p>
            </div>
        </div>

        @can('operate', App\Models\District::class)
            <x-edit-delete-entry href="/districts/{{$district->id}}" />
        @endcan
    </div>
@endsection
