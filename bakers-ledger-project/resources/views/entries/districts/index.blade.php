@extends('base')

@props(['districts'])

@section('title')
    Районы
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\District::class)
            @include('components.create-entry', ['href' => '/districts/create'])
        @endcan

        <div class="py-4">
            {{ $districts->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($districts as $district)
                <a href="/districts/{{ $district->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        @include('components.colout', [
                            'entity' => $district,
                            'colname' => 'название',
                            'goal' => $district->title,
                        ])
                        @include('components.colout', [
                            'entity' => $district,
                            'colname' => 'город',
                            'goal' => $district->settlement->title,
                        ])
                        @include('components.colout', [
                            'entity' => $district,
                            'colname' => 'автор',
                            'goal' => $district->user->name,
                            'author' => true,
                        ])

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $districts->links() }}
        </div>
    </div>
@endsection
