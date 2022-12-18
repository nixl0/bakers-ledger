@extends('base')

@props(['districts'])

@section('title')
    {{ __('messages.header-districts')}}
@endsection

@section('content')
<div class="m-4">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
        @foreach ($districts as $district)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                    @include('components.colout', ['entity' => $district, 'colname' => __('messages.field-title'), 'goal' => $district->title])
                    @include('components.colout', ['entity' => $district, 'colname' => __('messages.field-settlement'), 'goal' => $district->settlement->title])
                    
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $districts->links() }}
    </div>
</div>
@endsection
