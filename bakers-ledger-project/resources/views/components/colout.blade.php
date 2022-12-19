@props(['entity', 'colname', 'goal'])

<div class="flex">
    <span class="text-right pr-1">
        {{$colname}}:
    </span>
    <span class="font-semibold truncate" title="{{$goal}}">
        {{$goal}}
    </span>
</div>
