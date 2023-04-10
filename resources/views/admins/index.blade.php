@extends('templates.admin_app')

@section('title', 'Админка')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <div class="row justify-content-end">
                        <a class="btn btn-outline-dark rounded-0" href="{{route('admin.logout')}}">Выйти из admiki</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <div class="container min-vh-100">
                @include('admins.orders.sidebar')
                @include('inc.message')
                <div class="cards">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="ff-ts">#</th>
                            <th scope="col" class="ff-ts">Пользователь</th>
                            <th scope="col" class="ff-ts">Количество товаров</th>
                            <th scope="col" class="ff-ts">Статус</th>
                            <th scope="col" class="ff-ts">Стоимость</th>
                            <th scope="col" class="ff-ts">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ((old("orders") ?? $orders) as $order)
                            <tr>
                                <td scope="row">{{$order->id}}</td>
                                <td>{{$order->user->login}}</td>
                                <td class="text-xl-center">{{$order->amount}}</td>
                                <td>{{$order->status->status}}</td>
                                <td><p> Цена: {{$order->total_price}}; </p></td>
                                <td>
                                    <div class="mb-2">
                                        <a href="{{route('admin.orders.show', $order->id)}}"
                                           class="btn btn-outline-secondary rounded-0"> Состав заказа </a>
                                    </div>
                                    @if($order->status->id == "1")
                                        <div class="mb-2">
                                            <a href="{{route('admin.orders.confirmation', $order->id)}}"
                                               class="btn btn-success rounded-0"> Подтвердить заказ </a>
                                        </div>
                                    @endif
                                    @if($order->status->id != "3")
                                        <div class="mb-2">
                                            <a href="{{ route('admin.orders.messageDelete', $order->id) }}"
                                               class="btn  btn-danger rounded-0"> Отменить заказ </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <div class="m-lg-2">
                                <h1>Заказов по данному запросу не обнаружено :(</h1>
                            </div>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

@endsection
@push('script')
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
            crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
@endpush
