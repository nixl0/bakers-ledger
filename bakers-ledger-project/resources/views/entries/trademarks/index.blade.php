@extends('base')

@props(['trademarks'])

@section('title')
    Торговые марки
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Trademark::class)
            <x-create-entry href='/trademarks/create' />
        @endcan

        <div class="py-4">
            {{ $trademarks->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($trademarks as $trademark)
                <a href="/trademarks/{{ $trademark->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- title --}}
                        <x-colout colname="название" :goal="$trademark->title" />

                        {{-- company legal title --}}
                        <x-colout colname="тип собственности" :goal="$trademark->company->legal->title" />

                        {{-- company title --}}
                        <x-colout colname="предприятие" :goal="$trademark->company->title" />

                        {{-- grade title --}}
                        <x-colout colname="сорт муки" :goal="$trademark->grade->title" />

                        {{-- ingredients --}}
                        <x-colout colname="ингредиенты" :goal="$trademark->ingredients" />

                        {{-- author --}}
                        <x-colout-author :entity="$trademark" />

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $trademarks->links() }}
        </div>
    </div>
@endsection
