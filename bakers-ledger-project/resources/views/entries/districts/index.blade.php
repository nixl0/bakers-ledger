@extends('base')

@props(['districts'])

@section('title')
    Районы
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\District::class)
            <x-create-entry href='/districts/create' />
        @endcan

        <div class="py-4">
            {{ $districts->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($districts as $district)
                <a href="/districts/{{ $district->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        {{-- title --}}
                        <x-colout colname="название" :goal="$district->title" />

                        {{-- settlement --}}
                        <x-colout colname="город" :goal="$district->settlement->title" />


                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $districts->links() }}
        </div>
    </div>
@endsection
