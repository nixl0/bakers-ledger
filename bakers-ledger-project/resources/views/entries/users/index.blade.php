@extends('base')

@props(['users'])

@section('title')
    Пользователи
@endsection

@section('content')
    <div class="m-4 px-4">
        <div class="py-4">
            {{ $users->links() }}
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-4 justify-center">
            @foreach ($users as $user)
                <a href="/users/{{ $user->id }}">
                    <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">

                        @include('components.colout', ['entity' => $user, 'colname' => 'юзернейм', 'goal' => $user->name])
                        @include('components.colout', ['entity' => $user, 'colname' => 'фамилия', 'goal' => $user->last_name])
                        @include('components.colout', ['entity' => $user, 'colname' => 'имя', 'goal' => $user->first_name])
                        @include('components.colout', ['entity' => $user, 'colname' => 'отчество', 'goal' => $user->patronym])

                        {{-- companies --}}
                        <div class="flex">
                            <span class="text-right pr-1">
                                предприятия:
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
