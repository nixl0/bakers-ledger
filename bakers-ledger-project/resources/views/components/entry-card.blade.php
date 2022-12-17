@props(['columns', 'entry'])

@foreach ($columns as $column)
    @if ($column != 'id' and $column != 'created_at' and $column != 'updated_at')

        <div class="flex">
            <p class="text-align-right">
                {{$column}}:
            </p>
            <p class="text-align-left">
                {{$entry->$column}}
            </p>
        </div>
    @endif
@endforeach
