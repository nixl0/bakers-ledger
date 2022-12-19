@extends('base')

@props(['deliveries'])

@section('title')
    {{ __('messages.header-deliveries')}}
@endsection

@section('content')
<div class="m-4 px-4">
    <div class="py-4">
        {{ $deliveries->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($deliveries as $delivery)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-shop-number'), 'goal' => $delivery->shop->number])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-shop-title'), 'goal' => $delivery->shop->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-trademark'), 'goal' => $delivery->trademark->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-legal'), 'goal' => $delivery->trademark->company->legal->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-company'), 'goal' => $delivery->trademark->company->title])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-price'), 'goal' => $delivery->price])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-quantity'), 'goal' => $delivery->quantity])
                    @include('components.colout', ['entity' => $delivery, 'colname' => __('messages.field-date'), 'goal' => $delivery->date])

                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $deliveries->links() }}
    </div>
</div>
@endsection
