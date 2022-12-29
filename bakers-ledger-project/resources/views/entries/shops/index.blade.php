@extends('base')

@props(['shops'])

@section('title')
    Магазины
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Shop::class)
            <x-create-entry href='/shops/create' />
        @endcan

        <div class="py-4">
            {{ $shops->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($shops as $shop)
                <a href="/shops/{{ $shop->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- number --}}
                        <x-colout colname="номер" :goal="$shop->number" />

                        {{-- title --}}
                        <x-colout colname="название" :goal="$shop->title" />

                        {{-- district title --}}
                        <x-colout colname="район" :goal="$shop->district->title" />

                        {{-- district settlement title --}}
                        <x-colout colname="город" :goal="$shop->district->settlement->title" />

                        {{-- address --}}
                        <x-colout colname="адрес" :goal="$shop->address" />

                        {{-- phone --}}
                        <x-colout colname="телефон" :goal="$shop->phone" />

                        {{-- author --}}
                        <x-colout-author :entity="$shop" />

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $shops->links() }}
        </div>
    </div>
@endsection
