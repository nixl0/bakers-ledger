@extends('base')

@props(['grades'])

@section('title')
    {{ $grade->title }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        <x-back-button />

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>название:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $grade->title }}</p>
                <p class="text-slate-300">{{ $grade->user->name }}</p>
            </div>
        </div>

        @can('operate', App\Models\Grade::class)
            <x-edit-delete-entry href="/grades/{{$grade->id}}" />
        @endcan
    </div>
@endsection
