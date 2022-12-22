@extends('base')

@props(['company'])

@section('title')
    {{$company->legal->title}}
@endsection

@section('content')
<div class="mx-4 px-4">

    @include('components.back-button')

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <div class="flex flex-col justify-between space-y-4 pr-4 text-right">
            <p>номер:</p>
            <p>тип собственности:</p>
            <p>название:</p>
            <p>район:</p>
            <p>город:</p>
            <p>год основания:</p>
            <p>email:</p>
            <p>пользователи:</p>
        </div>
        <div class="flex flex-col justify-between space-y-4 font-bold">
            <p>{{$company->number}}</p>
            <p>{{$company->legal->title}}</p>
            <p>{{$company->title}}</p>
            <p>{{$company->district->title}}</p>
            <p>{{$company->district->settlement->title}}</p>
            <p>{{$company->since}}</p>
            <p>{{$company->email}}</p>

            <p>
                @foreach ($company->users as $user)
                    {{$user->name}}
                @endforeach
            </p>
        </div>
    </div>

    @include('components.edit-delete-buttons', ['href' => '/companies/' . $company->id ])
</div>
@endsection
