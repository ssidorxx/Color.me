@extends('templates.app')

@section('title', 'Состав заказа')
@section('content')

    <div class="d-flex col align-items-md-center">
        <div class="container">
            <div class="m-lg-2 d-flex row justify-content-between">
                <h5 class="m-lg-2 ff-ts">Состав заказа № {{ $order_id }}</h5>
                <div>
                    <div class="col-3 m-lg-2">
                        <a class="btn btn-outline-dark rounded-0" href="{{route('users.profile')}}"> Вернуться к заказам</a>
                    </div>
                    @include('inc.message')

                    @forelse ($orderContent as $content)

                        <div class="p-lg-2 m-lg-2 border border-dark rounded-0">
                            <div class="d-flex row justify-content-between">
                                <div class="col-1">
                                    <img src="{{$content->product->photo}}" class="img-fluid m-1" alt="{{$content->product->name}}">
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('products.show', $content->product->id) }}"
                                       class="text-decoration-none text-dark">
                                        <p class="card-title m-lg-2 ">{{$content->product->name}} </p>
                                    </a>
                                </div>

                                <div class="col-2">
                                    <p class=" card-title  m-lg-2">{{$content->count}} шт.</p>
                                </div>
                                <div class="col-2">
                                    <p class=" card-title  m-lg-2"> {{$content->product->price}} ₽/шт</p>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="mb-3">
                            <h1> нет товаров </h1>
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

