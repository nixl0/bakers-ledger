@extends('base')

@props(['legals'])

@section('title')
    {{ __('messages.header-legals')}}
@endsection

@section('content')
<div class="m-4 px-4">
    <div class="py-4">
        {{ $legals->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($legals as $legal)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">
                    @include('components.colout', ['entity' => $legal, 'colname' => __('messages.field-title'), 'goal' => $legal->title])
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $legals->links() }}
    </div>
</div>
@endsection
