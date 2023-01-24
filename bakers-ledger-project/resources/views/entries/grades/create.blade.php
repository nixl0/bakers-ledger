@extends('base')

@section('title')
    Добавить сорт муки
@endsection

@section('content')
<div class="m-4 px-4">

    <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
        <form action="/grades" method="POST" class="w-2/3 flex flex-col space-y-6">
            @csrf

            <h1 class="text-2xl font-bold text-center">Добавить сорт муки</h1>

            {{-- title --}}
            <x-input-box colname="название" colname_form="title" input_value="{{ old('title') }}" />
            @error('title')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror

            <button type="submit" class="px-6 py-4 my-2 w-fit self-center rounded-md flex space-x-2 transition duration-200 bg-slate-100 hover:drop-shadow-md">
                Добавить
            </button>
        </form>
    </div>
</div>
@endsection
