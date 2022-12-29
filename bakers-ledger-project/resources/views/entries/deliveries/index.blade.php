@extends('base')

@props(['deliveries'])

@section('title')
    Поставки
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('create', App\Models\Delivery::class)
            <x-create-entry href='/deliveries/create' />
        @endcan

        <div class="py-4">
            {{ $deliveries->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($deliveries as $delivery)
                <a href="/deliveries/{{ $delivery->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- shop number --}}
                        <x-colout colname="номер магазина" :goal="$delivery->shop->number" />

                        {{-- shop title --}}
                        <x-colout colname="название магазина" :goal="$delivery->shop->title" />

                        {{-- trademark title --}}
                        <x-colout colname="торговая марка" :goal="$delivery->trademark->title" />

                        {{-- trademark company legal title --}}
                        <x-colout colname="тип собственности" :goal="$delivery->trademark->company->legal->title" />

                        {{-- trademark company title --}}
                        <x-colout colname="предприятие" :goal="$delivery->trademark->company->title" />

                        {{-- price --}}
                        <x-colout colname="цена" :goal="$delivery->price" />

                        {{-- quantity --}}
                        <x-colout colname="количество" :goal="$delivery->quantity" />

                        {{-- date --}}
                        <x-colout colname="дата" :goal="$delivery->date" />

                        {{-- author --}}
                        <x-colout-author :entity="$delivery" />

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $deliveries->links() }}
        </div>
    </div>
@endsection
