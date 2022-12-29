@props(['colname', 'goal'])

<div class="flex">
    <span class="pr-1">
        {{ $colname }}:
    </span>
    <span class="font-semibold truncate" title="{{ $goal }}">
        {{ $goal }}
    </span>
</div>
