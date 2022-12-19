@extends('base')

@props(['users'])

@section('title')
    {{$user->name}}
@endsection

@section('content')
<div class="mx-4 px-4">

    @include('components.back-button')

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
            <p>юзернейм:</p>
            <p>фамилия:</p>
            <p>имя:</p>
            <p>отчество:</p>
            <p>предприятия:</p>
        </div>
        <div class="flex flex-col justify-between space-y-4 font-bold">
            <p>{{$user->name}}</p>
            <p>{{$user->last_name}}</p>
            <p>{{$user->first_name}}</p>
            <p>{{$user->patronym}}</p>

            <p>
                @foreach ($user->companies as $company)
                    {{$company->title}}
                @endforeach
            </p>
        </div>
    </div>
</div>
@endsection
