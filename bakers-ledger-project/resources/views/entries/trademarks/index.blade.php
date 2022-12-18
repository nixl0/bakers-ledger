@extends('base')

@props(['trademarks'])

@section('title')
    {{ __('messages.header-trademarks')}}
@endsection

@section('content')
<div class="m-4">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
        @foreach ($trademarks as $trademark)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $trademark, 'colname' => __('messages.field-title'), 'goal' => $trademark->title])
                    @include('components.colout', ['entity' => $trademark, 'colname' => __('messages.field-legal'), 'goal' => $trademark->company->legal->title])
                    @include('components.colout', ['entity' => $trademark, 'colname' => __('messages.field-company'), 'goal' => $trademark->company->title])
                    @include('components.colout', ['entity' => $trademark, 'colname' => __('messages.field-grade'), 'goal' => $trademark->grade->title])
                    @include('components.colout', ['entity' => $trademark, 'colname' => __('messages.field-ingredients'), 'goal' => $trademark->ingredients])

                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $trademarks->links() }}
    </div>
</div>
@endsection
