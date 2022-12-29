@props(['entity'])

<div class="flex">
    <span class="text-right pr-1 text-slate-300">
        автор:
    </span>
    <span class="font-semibold truncate text-slate-300" title="{{ $entity->user->name }}">
        {{ $entity->user->name }}
    </span>
</div>
