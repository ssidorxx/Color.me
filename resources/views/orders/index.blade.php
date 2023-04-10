@extends('templates.app')

@section('title', 'Заказы')
@section('content')

    <div class="d-flex col align-items-md-center">
        <div class="container min-vh-100">
            <div class="m-lg-2 d-flex row justify-content-between">
                    <h5 class="m-lg-2">Заказы</h5>
                    <div>

                        @include('inc.message')

                        @forelse ($orders as $order)

                            <div class="p-lg-2 m-lg-2 border border-dark rounded-0">
                                <div class="d-flex row justify-content-between">

                                    <div class="col-2">
                                        <h5 class="card-title m-lg-2 ">№{{$order->id}} </h5>
                                    </div>
                                    <div class="col-2">
                                        <p class="card-title m-lg-2 ">Статус: {{$order->status->status}} </p>
                                    </div>

                                    <div class="col-2">
                                        <p class=" card-title  m-lg-2"> Количество: {{$order->amount}}</p>
                                    </div>
                                    <div class="col-2">
                                        <p class=" card-title  m-lg-2"> Сумма: {{$order->total_price}}</p>
                                    </div>
                                    <div class="col-2">
                                        <a class="btn btn-outline-dark rounded-0" href="{{route('orders.show', $order->id)}}"> Посмотреть состав</a>
                                    </div>
                                    <div class="col-2">
                                    @if($order->status->status == "новый")
                                            <a class="btn btn-outline-dark rounded-0" href="{{route('orders.cancelOrder', $order->id)}}"> Отменить заказ </a>

                                            <a class="btn btn-outline-dark rounded-0" href="#"> Причина отмены заказа </a>
                                    @endif
                                        </div>
                                </div>
                            </div>

                        @empty
                            <div class="mb-3">
                                <h1> THERE ARE NO PRODUCTS ON THE BASKET :(</h1>
                            </div>
                        @endforelse
                    </div>

            </div>
        </div>
    </div>


@endsection
@push('script')
{{--    <script src="{{ asset('/js/script.js') }}"></script>--}}
    <script>

        const countSum = () => {
            let sum = 0;
            [...document.querySelectorAll(".countSum")].forEach((e) => {
                sum += parseInt(e.textContent);
            })
            return sum;
        }

        window.onload = function () {
            document.getElementById('summ').textContent = 'Итоговая стоимость: ' + countSum() + "P.";
        };

        const countAmount = () => {
            let amount = 0;
            [...document.querySelectorAll(".countAmount")].forEach((e) => {
                amount += parseInt(e.textContent);
            })
            return amount;
        }

        window.onload = function () {
            document.getElementById('countt').textContent = 'Всего товаров: ' + countAmount() + "шт.";
        };

    </script>
@endpush

