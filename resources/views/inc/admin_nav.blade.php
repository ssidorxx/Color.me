<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('admin.main') }}">
                            <span data-feather="home" class="align-text-bottom"></span>
                            <h3>Заказы</h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('admin.question.index') }}">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Вопросы
                        </a>
                    </li>
                    <li class="nav-item">

                    </li>

                    </li>
                    <li class="nav-item">
{{--                        <a class="nav-link" href="{{ route('admin.orders.index') }}">--}}
{{--                            <span data-feather="shopping-cart" class="align-text-bottom"></span>--}}
{{--                            Заказы--}}
{{--                        </a>--}}
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span data-feather="users" class="align-text-bottom"></span>--}}
{{--                            Customers--}}
{{--                        </a>--}}
{{--                    </li>--}}

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Работа с контентом</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>

                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.product.index') }}">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Товары
                        </a>
                    </li>

                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.categories.index') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Категории
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.brand.index') }}">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Бренды
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark active" aria-current="page" href="{{ route('admin.index') }}">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Администраторы
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

