@extends('templates.admin_app')

@section('title', 'Заказы')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100">
                @include('admins.orders.sidebar')
                @include('inc.message')
                <div class="cards">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Количество товаров</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ((old("orders") ?? $orders) as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>
                                    <h5 class="card-title">{{$order->user->name}} {{$order->user->surname}} {{$order->user->patronymic}}</h5>
                                </td>
                                <td class="text-xl-center">{{$order->amount}}</td>
                                <td>{{$order->status->status}}</td>
                                <td><p> Цена: {{$order->total_price}}; </p></td>
                                <td>
                                    <div class="mb-2">
                                        <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-secondary">
                                            Состав заказа </a>
                                    </div>
                                    @if($order->status->id == "1")
                                        <div class="mb-2">
                                            <a href="{{route('admin.orders.confirmation', $order->id)}}"
                                               class="btn btn-success"> Подтвердить заказ </a>
                                        </div>
                                    @endif
                                    @if($order->status->id != "3")
                                        <div class="mb-2">
                                            <a href="{{ route('admin.orders.messageDelete', $order->id) }}"
                                               class="btn  btn-danger"> Отменить заказ </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <div class="m-lg-2">
                                <tr>
                                    <td>
                                        <h1>Заказов по данному запросу не обнаружено :(</h1>
                                    </td>
                                </tr>
                            </div>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
