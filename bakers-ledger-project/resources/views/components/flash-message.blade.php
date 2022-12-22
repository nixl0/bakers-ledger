@if (session()->has('message'))
    <div class="fixed top-0 z-10 bg-slate-100 py-12 w-max text-xl items-center text-green-700">
        {{-- // TODO fix centering  --}}
        <p class="flex space-x-2 items-center">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </span>
            <span>
                {{ session('message') }}
            </span>
        </p>
    </div>
@endif
