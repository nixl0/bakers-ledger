<div class="flex shadow-md justify-center">
    <header class="drop-shadow-md">

        {{-- main --}}
        <div class="flex justify-center flex-wrap">
            <a href="/" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="font-bold">
                    Главная
                </span>
            </a>
            <a href="/queries" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="font-bold">
                    Запросы
                </span>
            </a>

            @auth
                <p class="m-2 p-2">Добро пожаловать, {{ auth()->user()->name }}</p>

                <a href="/profile" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                    <span class="font-bold">
                        Профиль
                    </span>
                </a>

                <form action="/logout" method="POST">
                    @csrf

                    <button type="submit" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                        <span class="font-bold">
                            Выйти
                        </span>
                    </button>
                </form>
            @else
                <a href="/login" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                    <span class="font-bold">
                        Войти
                    </span>
                </a>
                <a href="/register" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                    <span class="font-bold">
                        Регистрация
                    </span>
                </a>
            @endauth
        </div>

        <div class="h-0 border border-t-2 border-b-0 border-x-0"></div>

        {{-- tables --}}
        <div class="flex justify-center flex-wrap">
            <a href="/settlements" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Города
                </span>
            </a>
            <a href="/legals" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Типы собственности
                </span>
            </a>
            <a href="/grades" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Сорта муки
                </span>
            </a>
            <a href="/districts" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Районы
                </span>
            </a>
            <a href="/companies" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Предприятия
                </span>
            </a>
            <a href="/owners" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Владельцы
                </span>
            </a>
            <a href="/shops" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Магазины
                </span>
            </a>
            <a href="/deliveries" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Поставки
                </span>
            </a>
            <a href="/goods" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Товары
                </span>
            </a>
            <a href="/trademarks" class="m-2 p-2 rounded-md transition duration-200 hover:bg-slate-100">
                <span class="">
                    Торговые марки
                </span>
            </a>
        </div>
    </header>
</div>
