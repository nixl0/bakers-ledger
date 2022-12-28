@extends('base')

@props(['trademarks'])

@section('title')
    Торговые марки
@endsection

@section('content')
    <div class="m-4 px-4">
        @can('operate', App\Models\Trademark::class)
            @include('components.create-entry', ['href' => '/trademarks/create'])
        @endcan

        <div class="py-4">
            {{ $trademarks->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($trademarks as $trademark)
                <a href="/trademarks/{{ $trademark->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 hover:drop-shadow-md">

                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'название',
                            'goal' => $trademark->title,
                        ])
                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'тип собственности',
                            'goal' => $trademark->company->legal->title,
                        ])
                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'предприятие',
                            'goal' => $trademark->company->title,
                        ])
                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'сорт муки',
                            'goal' => $trademark->grade->title,
                        ])
                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'ингредиенты',
                            'goal' => $trademark->ingredients,
                        ])
                        @include('components.colout', [
                            'entity' => $trademark,
                            'colname' => 'автор',
                            'goal' => $trademark->user->name,
                            'author' => true,
                        ])

                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $trademarks->links() }}
        </div>
    </div>
@endsection
