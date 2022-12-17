@props(['columns', 'settlements'])

@extends('base')

@section('title')
    settlements
@endsection

@include('header')

@section('content')

    {{-- <div class="bg-red-500 flex m-96">
        @foreach ($settlements as $settlement)
            <x-entry-card :columns='$columns' :entry='$settlement' />
        @endforeach
    </div> --}}


    @foreach ($settlements as $settlement)
        <div class="bg-red-500">
            <p class="py-6">title:</p>
            <p>{{$settlement->title}}</p>
        </div>
    @endforeach
@endsection
