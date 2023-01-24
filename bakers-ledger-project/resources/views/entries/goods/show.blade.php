@extends('base')

@props(['goods_instance'])

@section('title')
    {{ $goods_instance->id }}
@endsection

@section('content')
    <div class="mx-4 px-4">

        <x-back-button />

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
                <p>номер поставки:</p>
                <p>торговая марка:</p>
                <p>тип собственности:</p>
                <p>предприятие:</p>
                <p>количество:</p>
                <p class="text-slate-300">автор:</p>
            </div>
            <div class="flex flex-col justify-between space-y-4 font-bold">
                <p>{{ $goods_instance->delivery->id }}</p>
                <p>{{ $goods_instance->trademark->title }}</p>
                <p>{{ $goods_instance->trademark->company->legal->title }}</p>
                <p>{{ $goods_instance->trademark->company->title }}</p>
                <p>{{ $goods_instance->quantity }}</p>
                <p class="text-slate-300">{{ $goods_instance->user->name }}</p>
            </div>
        </div>

        @can('update', $goods_instance)
            <x-edit-entry href="/goods/{{$goods_instance->id}}" />
        @endcan

        @can('delete', App\Models\Goods::class)
            <x-edit-delete-entry href="/goods/{{$goods_instance->id}}" />
        @endcan
    </div>
@endsection
