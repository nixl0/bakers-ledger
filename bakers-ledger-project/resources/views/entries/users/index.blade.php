@extends('base')

@props(['users'])

@section('title')
    {{ __('messages.header-users') }}
@endsection

@section('content')
    <div class="m-4">
        <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
            @foreach ($users as $user)
                <a href="">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                        @include('components.colout', ['entity' => $user, 'colname' => __('messages.field-name'), 'goal' => $user->name])
                        @include('components.colout', ['entity' => $user, 'colname' => __('messages.field-last_name'), 'goal' => $user->last_name])
                        @include('components.colout', ['entity' => $user, 'colname' => __('messages.field-first_name'), 'goal' => $user->first_name])
                        @include('components.colout', ['entity' => $user, 'colname' => __('messages.field-patronym'), 'goal' => $user->patronym])

                        {{-- companies --}}
                        <div class="flex">
                            <span class="text-right pr-1">
                                {{ __('messages.field-companies') }}:
                            </span>
                            <span class="font-semibold truncate">
                                @foreach ($user->companies as $company)
                                    <p>
                                        <span>{{ $company->legal->title }}</span>
                                        <span>{{ $company->title }}</span>
                                    </p>
                                @endforeach
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="py-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
