@extends('base')

@props(['settlements'])

@section('title')
    Города
@endsection

@section('content')
    <div class="m-4 px-4">

        @can('operate', App\Models\Settlement::class)
            @include('components.create-entry', ['href' => '/settlements/create'])
        @endcan

        <div class="py-4">
            {{ $settlements->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($settlements as $settlement)
                <a href="/settlements/{{ $settlement->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">
                        @include('components.colout', [
                            'entity' => $settlement,
                            'colname' => 'название',
                            'goal' => $settlement->title,
                        ])
                        @include('components.colout', [
                            'entity' => $settlement,
                            'colname' => 'автор',
                            'goal' => $settlement->user->name,
                            'author' => true,
                        ])
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $settlements->links() }}
        </div>
    </div>
@endsection
