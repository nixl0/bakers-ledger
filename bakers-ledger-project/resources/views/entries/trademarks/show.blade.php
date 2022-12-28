@extends('base')

@props(['trademarks'])

@section('title')
    {{ $trademark->title }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        @include('components.back-button')

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>номер:</p>
                <p>тип собственности:</p>
                <p>предприятие:</p>
                <p>сорт муки:</p>
                <p>ингредиенты:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $trademark->title }}</p>
                <p>{{ $trademark->company->legal->title }}</p>
                <p>{{ $trademark->company->title }}</p>
                <p>{{ $trademark->grade->title }}</p>
                <p>{{ $trademark->ingredients }}</p>
                <p class="text-slate-300">{{ $trademark->user->name }}</p>
            </div>
        </div>

        @can('operate', App\Models\Trademark::class)
            @include('components.edit-delete-buttons', ['href' => '/trademarks/' . $trademark->id])
        @endcan
    </div>
@endsection
