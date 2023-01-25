@extends('base')

@props(['goods_instance', 'shops', 'trademarks'])

@section('title')
    Изменить товар
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/goods/{{ $goods_instance->id }}" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold text-center">Изменить товар</h1>

            {{-- delivery_id --}}
            <x-input-box-search colname="поставка" colname_form="delivery_id" input_value="{{ $goods_instance->delivery->id }}">
                @foreach ($deliveries as $delivery)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $delivery->id }}">{{ $delivery->date }} <br>{{ $delivery->shop->title }}, {{ $delivery->shop->number }}</li>
                @endforeach
            </x-input-box-search>
            @error('delivery_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- trademark_id --}}
            <x-input-box-search colname="торговая марка" colname_form="trademark_id" input_value="{{ $goods_instance->trademark->id }}">
                @foreach ($trademarks as $trademark)
                    <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                        value="{{ $trademark->id }}">{{ $trademark->title }}, {{ $trademark->company->title }}</li>
                @endforeach
            </x-input-box-search>
            @error('trademark_id')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            {{-- quantity --}}
            <x-input-box colname="количество" colname_form="quantity" input_value="{{ $goods_instance->quantity }}" type="number" />
            @error('quantity')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            <button type="submit" class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                Изменить
            </button>
        </form>
    </div>
</div>
@endsection
