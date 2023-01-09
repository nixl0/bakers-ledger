@extends('base')

@props(['company', 'districts', 'legals', 'owners'])

@section('title')
    Редактировать предприятие
@endsection

@section('content')
    <div class="m-4 px-4">

        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <form action="/companies/{{ $company->id }}" method="POST" class="w-2/3 flex flex-col space-y-6">
                @csrf
                @method('PUT')

                <h1 class="text-2xl font-bold text-center">Редактировать предприятие</h1>

                {{-- number --}}
                <x-input-box colname="номер" colname_form="number" input_value="{{ $company->number }}" />
                @error('number')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- legal_id --}}
                <x-input-box-search colname="тип собственности" colname_form="legal_id"
                    input_value="{{ $company->legal_id }}">
                    @foreach ($legals as $legal)
                        <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                            value="{{ $legal->id }}">{{ $legal->title }}</li>
                    @endforeach
                </x-input-box-search>
                @error('legal_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- title --}}
                <x-input-box colname="название" colname_form="title" input_value="{{ $company->title }}" />
                @error('title')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- district_id --}}
                <x-input-box-search colname="район" colname_form="district_id" input_value="{{ $company->district_id }}">
                    @foreach ($districts as $district)
                        <li class="ledger-search-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                            value="{{ $district->id }}">{{ $district->title }}, {{ $district->settlement->title }}</li>
                    @endforeach
                </x-input-box-search>
                @error('district_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- since --}}
                <x-input-box colname="год основания" colname_form="since" input_value="{{ $company->since }}" />
                @error('since')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- phone --}}
                <x-input-box colname="телефон" colname_form="phone" input_value="{{ $company->phone }}" />
                @error('phone')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- email --}}
                <x-input-box colname="email" colname_form="email" input_value="{{ $company->email }}" />
                @error('email')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                {{-- owners multiselect --}}
                @php
                    $ownersArr = [];
                    foreach ($company->owners as $owner) {
                        array_push($ownersArr, $owner->id);
                    }

                    $ownersStr = implode(',', $ownersArr);
                @endphp
                <x-input-box-multiple colname="владельцы" colname_form="owner_id" input_value="{{ $ownersStr }}">
                    @foreach ($owners as $owner)
                        <li class="ledger-multiple-li cursor-pointer p-2 m-1 rounded-md transition duration-200 hover:bg-slate-300"
                            value="{{ $owner->id }}">{{ $owner->lastname }} {{ $owner->firstname }}
                            {{ $owner->patronym }}</li>
                    @endforeach
                </x-input-box-multiple>
                @error('owner_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit"
                    class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                    Изменить
                </button>
            </form>
        </div>
    </div>
@endsection
