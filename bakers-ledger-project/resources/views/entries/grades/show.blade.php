@extends('base')

@props(['grades'])

@section('title')
    {{$grade->title}}
@endsection

@section('content')
<div class="mx-4 px-4">

    @include('components.back-button')

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
            <p>название:</p>
        </div>
        <div class="flex flex-col justify-between space-y-4 font-bold">
            <p>{{$grade->title}}</p>
        </div>
    </div>
</div>
@endsection
