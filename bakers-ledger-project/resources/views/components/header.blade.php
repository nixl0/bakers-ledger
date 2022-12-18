<div class="flex shadow-md">
    <header class="flex justify-center flex-wrap drop-shadow-md">
        <a href="{{ route('home', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="font-bold">
                {{ __('messages.header-home') }}
            </span>
        </a>
        <a href="{{ route('queries', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="font-bold">
                {{ __('messages.header-queries') }}
            </span>
        </a>
        <a href="{{ route('settlements', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-settlements') }}
            </span>
        </a>
        <a href="{{ route('legals', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-legals') }}
            </span>
        </a>
        <a href="{{ route('grades', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-grades') }}
            </span>
        </a>
        <a href="{{ route('districts', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-districts') }}
            </span>
        </a>
        <a href="{{ route('companies', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-companies') }}
            </span>
        </a>
        <a href="{{ route('users', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-users') }}
            </span>
        </a>
        <a href="{{ route('shops', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-shops') }}
            </span>
        </a>
        <a href="{{ route('deliveries', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-deliveries') }}
            </span>
        </a>
        <a href="{{ route('trademarks', app()->getLocale()) }}" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
            <span class="">
                {{ __('messages.header-trademarks') }}
            </span>
        </a>
    </header>
    <div class="text-center">
        <a href="{{ route(Route::currentRouteName(), 'en') }}">
            <span>
                en
            </span>
        </a>
        <a href="{{ route(Route::currentRouteName(), 'ru') }}">
            <span>
                ru
            </span>
        </a>
    </div>
</div>
