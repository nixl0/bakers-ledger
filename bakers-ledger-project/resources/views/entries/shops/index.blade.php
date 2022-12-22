@extends('base')

@props(['shops'])

@section('title')
    Магазины
@endsection

@section('content')
<div class="m-4 px-4">
    @include('components.create-entry', ['href' => '/shops/create'])

    <div class="py-4">
        {{ $shops->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($shops as $shop)
            <a href="/shops/{{ $shop->id }}">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $shop, 'colname' => 'номер', 'goal' => $shop->number])
                    @include('components.colout', ['entity' => $shop, 'colname' => 'название', 'goal' => $shop->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => 'район', 'goal' => $shop->district->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => 'город', 'goal' => $shop->district->settlement->title])
                    @include('components.colout', ['entity' => $shop, 'colname' => 'адрес', 'goal' => $shop->address])
                    @include('components.colout', ['entity' => $shop, 'colname' => 'телефон', 'goal' => $shop->phone])

                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $shops->links() }}
    </div>
</div>
@endsection
