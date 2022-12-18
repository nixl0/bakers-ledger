@extends('base')

@props(['districts'])

@section('title')
    {{ __('messages.header-home')}}
@endsection

@section('content')
<div class="m-4">
    <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 justify-center">
        @foreach ($districts as $district)
            <a href="">
                <div class="p-4 m-2 rounded-md hover:bg-slate-100 transition duration-200 drop-shadow-md">
                    {{-- title --}}
                    <div class="flex">
                        <span class="text-right pr-1">
                            {{ __('messages.field-title') }}:
                        </span>
                        <span class="font-semibold truncate" title="{{$district->title}}">
                            {{$district->title}}
                        </span>
                    </div>
                    {{-- settlement title --}}
                    <div class="flex">
                        <span class="text-right pr-1">
                            {{ __('messages.field-settlement') }}:
                        </span>
                        <span class="font-semibold truncate" title="{{$district->settlement->title}}">
                            {{$district->settlement->title}}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="py-4">
        {{ $districts->links() }}
    </div>
</div>
@endsection
