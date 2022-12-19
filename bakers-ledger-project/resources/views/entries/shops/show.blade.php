@extends('base')

@props(['grades'])

@section('title')
    {{$shop->title}}
@endsection

@section('content')
<div class="mx-4 px-4">

    @include('components.back-button')

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
            <p>номер:</p>
            <p>название:</p>
            <p>район:</p>
            <p>город:</p>
            <p>адрес:</p>
            <p>телефон:</p>
        </div>
        <div class="flex flex-col justify-between space-y-4 font-bold">
            <p>{{$shop->number}}</p>
            <p>{{$shop->title}}</p>
            <p>{{$shop->district->title}}</p>
            <p>{{$shop->district->settlement->title}}</p>
            <p>{{$shop->address}}</p>
            <p>{{$shop->phone}}</p>
        </div>
    </div>
</div>
@endsection
