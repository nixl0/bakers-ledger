@props(['entity', 'colname', 'goal', 'author'])

<div class="flex">
    @if (!isset($author))
        <span class="text-right pr-1">
            {{ $colname }}:
        </span>
        <span class="font-semibold truncate" title="{{ $goal }}">
            {{ $goal }}
        </span>
    @else
        <span class="text-right pr-1 text-slate-300">
            {{ $colname }}:
        </span>
        <span class="font-semibold truncate text-slate-300" title="{{ $goal }}">
            {{ $goal }}
        </span>
    @endif
</div>
