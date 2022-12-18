@extends('base')

@props(['settlements'])

@section('title')
    {{ __('messages.header-settlements')}}
@endsection

@section('content')
<div class="m-4">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
        @foreach ($settlements as $settlement)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">
                    @include('components.colout', ['entity' => $settlement, 'colname' => __('messages.field-title'), 'goal' => $settlement->title])
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $settlements->links() }}
    </div>
</div>
@endsection
