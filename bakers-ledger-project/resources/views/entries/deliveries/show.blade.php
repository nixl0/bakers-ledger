@extends('base')

@props(['delivery'])

@section('title')
    {{$delivery->trademark->title}} > {{$delivery->shop->title}}
@endsection

@section('content')
<div class="mx-4 px-4">

    @include('components.back-button')

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
            <p>номер магазина:</p>
            <p>название магазина:</p>
            <p>торговая марка:</p>
            <p>тип собственности:</p>
            <p>предприятие:</p>
            <p>цена:</p>
            <p>количество:</p>
            <p>дата:</p>
        </div>
        <div class="flex flex-col justify-between space-y-4 font-bold">
            <p>{{$delivery->shop->number}}</p>
            <p>{{$delivery->shop->title}}</p>
            <p>{{$delivery->trademark->title}}</p>
            <p>{{$delivery->trademark->company->legal->title}}</p>
            <p>{{$delivery->trademark->company->title}}</p>
            <p>{{$delivery->price}}</p>
            <p>{{$delivery->quantity}}</p>
            <p>{{$delivery->date}}</p>
        </div>
    </div>
</div>
@endsection
