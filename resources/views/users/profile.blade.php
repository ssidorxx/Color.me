@extends('templates.app')

@section('title', 'Профиль')
@section('content')
    <div class="container ">
        <div class="row justify-content-between">
            <div class="col-6">
                <h3 class="p-lg-2 ff-ts ">Здравствуйте, {{ auth()->user()->name }}! Ваш логин:
                    <u>{{ auth()->user()->login }}</u></h3>
            </div>
            <div class="col-2">
                <div class="row justify-content-end">
                    <a class="btn btn-outline-dark rounded-0" href="{{route('logout')}}">Выйти из профиля</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="p-lg-2">
                <h3 class="ff-ts">Ваши заказы:</h3>
            </div>
            {{--                    <a class="btn btn-outline-dark p-lg-2" href="{{ route('orders.index') }}">Мои заказы</a>--}}
        </div>
        <div class="m-lg-2 d-flex row justify-content-between">
            <div>
                @include('inc.message')

                @forelse ($orders as $order)

                    <div class="p-lg-2 m-lg-2 border border-dark rounded-0">
                        <div class="d-flex row justify-content-between ff-ts fs-5">

                            <div class="col-1">
                                <h5 class="card-title m-lg-2 ">№{{$order->id}} </h5>
                            </div>
                            <div class="col">
                                <p class="card-title m-lg-2 fw-bolder"> {{$order->status->status}} </p>
                            </div>

                            <div class="col">
                                <p class=" card-title  m-lg-2">{{$order->amount}} шт.</p>
                            </div>
                            <div class="col">
                                <p class=" card-title  m-lg-2"> Сумма: {{$order->total_price}} ₽</p>
                            </div>
                            <div class="col-2">
                                <div class="col">
                                    @if($order->status->status == "новый")
                                        <a class="btn btn-outline-dark rounded-0" href="{{route('orders.cancelOrder', $order->id)}}"> Отменить заказ </a>
                                    @elseif($order->status->status == "отмененный" && $order->comment != null)
                                        <button type="button" class="btn btn-outline-dark rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id }}">
                                            Причина отмены
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <a class="btn btn-outline-dark rounded-0" href="{{route('orders.show', $order->id)}}"> Посмотреть состав</a>
                            </div>
                        </div>
                    </div>
                    @if($order->status->status == "отмененный" && $order->comment != null)
                        <div class="modal fade rounded-0" id="exampleModal{{ $order->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 ff-ts" id="exampleModalLabel">Причина отмены вашего заказа</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $order->comment }}</p>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-outline-dark rounded-0" data-bs-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="mb-3 ff-ts">
                        <h3> У вас пока нет заказов :( </h3>
                    </div>
                @endforelse
            </div>

        </div>
    </div>


    <!-- Модальное окно -->


@endsection
