@extends('base')

@props(['grades'])

@section('title')
    Сорта муки
@endsection

@section('content')
    <div class="m-4 px-4">

        @can('operate', App\Models\Grade::class)
            @include('components.create-entry', ['href' => '/grades/create'])
        @endcan

        <div class="py-4">
            {{ $grades->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($grades as $grade)
                <a href="/grades/{{ $grade->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">
                        @include('components.colout', [
                            'entity' => $grade,
                            'colname' => 'название',
                            'goal' => $grade->title,
                        ])
                        @include('components.colout', [
                            'entity' => $grade,
                            'colname' => 'автор',
                            'goal' => $grade->user->name,
                            'author' => true,
                        ])
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $grades->links() }}
        </div>
    </div>
@endsection
