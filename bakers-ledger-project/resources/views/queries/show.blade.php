@extends('base')

@section('title')
    {{ $query }}
@endsection

@section('content')
    <div class="m-4 p-4">
        <div class="border shadow-xl rounded-md p-8 flex flex-row justify-center">
            <div class="flex flex-col justify-between space-y-4 pr-4">

                <h1 class="text-center text-xl font-bold">{{ $query }}</h1>

                <table>
                    <thead>
                        <tr>
                            @foreach ($result[0] as $key => $col)
                                <th>{{ $key }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $item)
                            <tr>
                                @foreach ($item as $col)
                                    <th class="p-2 border">{{ $col }}</th>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
