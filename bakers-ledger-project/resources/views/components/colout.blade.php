@props(['entity', 'colname', 'goal'])

<div class="flex">
    <span class="text-right pr-1">
        {{$colname}}:
    </span>
    <span class="font-semibold truncate" title="{{$entity->$goal}}">
        {{$goal}}
    </span>
</div>
