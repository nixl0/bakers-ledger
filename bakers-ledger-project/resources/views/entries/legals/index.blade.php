@extends('base')

@props(['legals'])

@section('title')
    Типы собственности
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Legal::class)
            @include('components.create-entry', ['href' => '/legals/create'])
        @endcan

        <div class="py-4">
            {{ $legals->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($legals as $legal)
                <a href="/legals/{{ $legal->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">
                        @include('components.colout', [
                            'entity' => $legal,
                            'colname' => 'название',
                            'goal' => $legal->title,
                        ])
                        @include('components.colout', [
                            'entity' => $legal,
                            'colname' => 'автор',
                            'goal' => $legal->user->name,
                            'author' => true,
                        ])
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $legals->links() }}
        </div>
    </div>
@endsection
