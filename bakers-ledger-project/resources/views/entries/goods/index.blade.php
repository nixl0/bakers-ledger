@extends('base')

@props(['goods'])

@section('title')
    Товары
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('create', App\Models\Goods::class)
            <x-create-entry href='/goods/create' />
        @endcan

        <div class="py-4">
            {{ $goods->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($goods as $goods_instance)
                <a href="/goods/{{ $goods_instance->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- delivery --}}
                        <x-colout colname="поставка" :goal="$goods_instance->delivery->id" />

                        {{-- trademark title --}}
                        <x-colout colname="торговая марка" :goal="$goods_instance->trademark->title" />

                        {{-- trademark company legal title --}}
                        <x-colout colname="тип собственности" :goal="$goods_instance->trademark->company->legal->title" />

                        {{-- trademark company title --}}
                        <x-colout colname="предприятие" :goal="$goods_instance->trademark->company->title" />

                        {{-- quantity --}}
                        <x-colout colname="количество" :goal="$goods_instance->quantity" />

                        {{-- author --}}
                        <x-colout-author :entity="$goods_instance" />

                    </div>
                </a>
            @endforeach

        </div>

        <div class="py-4">
            {{ $goods->links() }}
        </div>
    </div>
@endsection
