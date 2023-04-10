<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item">
            <a class="nav-link text-decoration-none text-body-secondary" href="{{ route('main.index') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-decoration-none text-body-secondary" href="{{ route('about') }}">О нас</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-decoration-none text-body-secondary" href="{{ route('products.index') }}">Товары</a>
        </li>
        @guest
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-decoration-none text-body-secondary" href="{{ route('admin.login') }}">вход--}}
{{--                    админ</a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-body-secondary" href="{{ route('users.create') }}">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-body-secondary" href="{{route('login')}}">Вход</a>
            </li>
        @endguest

        @auth
            <li class="nav-item">
                <a class="nav-link text-decoration-none text-body-secondary"
                   href="{{ route('users.profile') }}">Профиль</a>
            </li>


        @endauth
    </ul>
    <p class="text-center text-body-secondary"> 2023 Color.Me, Inc</p>
</footer>

