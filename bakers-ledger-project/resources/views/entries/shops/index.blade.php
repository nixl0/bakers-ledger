@extends('base')

@props(['grades'])

@section('title')
    {{ __('messages.header-shops')}}
@endsection

@section('content')
<div class="m-4">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
        @foreach ($shops as $shop)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-number'), 'goal' => $shop->number])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-title'), 'goal' => $shop->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-district'), 'goal' => $shop->district->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-district'), 'goal' => $shop->district->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-settlement'), 'goal' => $shop->district->settlement->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-address'), 'goal' => $shop->address])
                    @include('components.colout', ['entity' => $shop, 'colname' => __('messages.field-phone'), 'goal' => $shop->phone])
                    
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $shops->links() }}
    </div>
</div>
@endsection
