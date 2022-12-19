@extends('base')

@props(['companies'])

@section('title')
    {{ __('messages.header-companies')}}
@endsection

@section('content')
<div class="m-4 px-4">
    <div class="py-4">
        {{ $companies->links() }}
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
        @foreach ($companies as $company)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-number'), 'goal' => $company->number])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-legal'), 'goal' => $company->legal->title])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-title'), 'goal' => $company->title])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-district'), 'goal' => $company->district->title])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-settlement'), 'goal' => $company->district->settlement->title])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-since'), 'goal' => $company->since])
                    @include('components.colout', ['entity' => $company, 'colname' => __('messages.field-email'), 'goal' => $company->email])

                    {{-- users --}}
                    <div class="flex">
                        <span class="text-right pr-1">
                            {{ __('messages.field-users') }}:
                        </span>
                        <span class="font-semibold truncate">
                            @foreach ($company->users as $user)
                                <p>{{ $user->name }}</p>
                            @endforeach
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $companies->links() }}
    </div>
</div>
@endsection
