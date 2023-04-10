<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color:rgb(254,254,254);"
         id="navbar">
        <div class="container ">
            <div>
                <a class="navbar-brand" href="/">Color.Me</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Товары</a>
                    </li>
                    @guest
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('admin.login') }}">вход админ</a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.create') }}">Регистрация</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Вход</a>
                        </li>
                    @endguest

                    @auth



                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.profile') }}">Профиль</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('basket.index') }}">Корзина</a>
                        </li>

                    @endauth
                </ul>

            </div>
        </div>
    </nav>
</header>
