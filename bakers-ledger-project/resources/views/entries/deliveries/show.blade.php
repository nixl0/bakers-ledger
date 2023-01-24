@extends('base')

@props(['delivery'])

@section('title')
    {{ $delivery->id }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        <x-back-button />

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>номер магазина:</p>
                <p>название магазина:</p>
                <p>дата:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $delivery->shop->number }}</p>
                <p>{{ $delivery->shop->title }}</p>
                <p>{{ $delivery->date }}</p>
                <p class="text-slate-300">{{ $delivery->user->name }}</p>
            </div>
        </div>

        @can('update', $delivery)
            <x-edit-entry href="/deliveries/{{$delivery->id}}" />
        @endcan

        @can('delete', App\Models\Delivery::class)
            <x-edit-delete-entry href="/deliveries/{{$delivery->id}}" />
        @endcan
    </div>
@endsection
