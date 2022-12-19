@extends('base')

@props(['deliveries'])

@section('title')
    Поставки
@endsection

@section('content')
<div class="m-4 px-4">
    <div class="py-4">
        {{ $deliveries->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($deliveries as $delivery)
            <a href="/deliveries/{{ $delivery->id }}">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $delivery, 'colname' => 'номер магазина', 'goal' => $delivery->shop->number])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'название магазина', 'goal' => $delivery->shop->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'торговая марка', 'goal' => $delivery->trademark->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'тип собственности', 'goal' => $delivery->trademark->company->legal->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'предприятие', 'goal' => $delivery->trademark->company->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'цена', 'goal' => $delivery->price])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'количество', 'goal' => $delivery->quantity])
                    @include('components.colout', ['entity' => $delivery, 'colname' => 'дата', 'goal' => $delivery->date])

                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $deliveries->links() }}
    </div>
</div>
@endsection
