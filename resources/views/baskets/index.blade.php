@extends('templates.app')

@section('title', 'Корзина')
@section('content')
    <main>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <div class="d-flex col align-items-md-center">
                <div class="container" style="">
                    <div class="m-lg-2 d-flex row justify-content-between">
                        <div class="col" >

                            <h3 class="ff-ts " id="header">Ваша корзина</h3>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-8">

                            <table class="table table-bordered">
                                @if(count($baskets)>0)
                                    <th class="ff-ts">
                                        <div class="row justify-content-between">
                                            <div class="col-3 fs-5">
                                                Товары в корзине:
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">

                                                <form method="POST"
                                                      action="{{ route("basket.delete") }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="good-btn"
                                                            class="btn btn-outline-dark rounded-0"> Очистить корзину
                                                    </button>
                                                </form>

                                            </div>
                                        </div>

                                    </th>
                                    <tbody>
                                @endif
                                    @forelse ((old("baskets") ?? $baskets) as $basket)
                                        <tr>
                                            <td>

                                                <div class="d-flex row">
                                                    <div class="col">
                                                        <img alt="" src="{{$basket->product->photo}}"
                                                             class="img-fluid"
                                                        >
                                                    </div>
                                                    <div class="col-5">
                                                        <h5 class="card-title m-lg-2">{{$basket->product->title}} </h5>
                                                        <div class="m-lg-2">
                                                            <h5>{{$basket->product->name}}</h5>
                                                            <p style="font-size: 1rem">{{$basket->product->price}} ₽/шт
                                                                <br>
                                                                На
                                                                складе: {{$basket->product->count}}</p>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex m-lg-2">
                                                            <a href="#" data-id="{{ $basket->product->id }}"
                                                               class="btn btn-dark minusProduct rounded-0">-</a>
                                                            <p class="m-lg-2 amountProduct"
                                                               id="{{ $basket->product->id }}"
                                                               style="font-size: 1.2rem">{{$basket->amount}}</p>
                                                            <a href="#" data-id="{{ $basket->product->id }}"
                                                               class="btn btn-dark plusProduct rounded-0"
                                                               style="font-size: 1rem">+</a>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="m-lg-2">
                                                            <h5 class="list-group-item">

                                                    <span class="countSum" data-sum="{{ $basket->product->id }}">
                                                {{$basket->price}}
                                            </span>
                                                                ₽
                                                            </h5>

                                                        </div>
                                                    </div>
                                                    <div class="col-1 d-flex justify-content-end">
                                                        <form method="POST"
                                                              action="{{ route("basket.destroy", $basket->product->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="productDelete"
                                                                data-del="{{ $basket->product->id }}"
                                                                style="border: none; background:none;">
                                                                <img src="{{ asset('../images/qwqeq.png') }}" alt=""
                                                                     style="width: 2em; ">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <div class="m-lg-5 text-center ff-ts ">
                                            <h1> ТУТ ПОКА ПУСТО :( </h1>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                        <div class="col" style="position: relative">
                            <div class="col filter-container shadow  p-2" style="height: 12rem; width: 24em"
                                 id="filters">
                                <h4 class="ff-ts text-center  mt-3">Оформление заказа</h4>
                                <hr>
                                <div class="col ">
                                    <div class="col d-flex row justify-content-between fw-bolder fs-4 ff-ts">
                                        <div class="col d-flex justify-content-end">
                                            <p>Итог:</p>
                                        </div>
                                        <div class="col d-flex justify-content-start">
                                            <p id="summ"></p>
                                        </div>

                                    </div>
                                    <div class="col d-flex justify-content-center">

                                        <form method="POST" action="{{ route('orders.store') }}">
                                            @csrf
                                            <button id="good-btn" href="{{ route('orders.index') }}"
                                                    class="btn btn-dark rounded-0 {{ count($baskets)>0 ? "" : "disabled" }}"
                                                    style="width: 16rem;">Перейти
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </main>

@endsection

@push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
    <script>

        const countSum = () => {
            let sum = 0;
            [...document.querySelectorAll(".countSum")].forEach((e) => {
                sum += parseInt(e.textContent);
            })
            return sum;
        }

        window.onload = function () {
            document.getElementById('summ').textContent = countSum() + " ₽";
        };

        [...document.querySelectorAll('.plusProduct')].forEach((btn) => {

            btn.addEventListener('click', async (e) => {
                e.preventDefault()
                let res = await postJson('{{route("basket.add")}}', e.target.dataset.id, 'POST', '{{ csrf_token() }}');
                console.log(res)
                document.getElementById(res.data.product_id).textContent = res.data.amount;
                document.querySelector(`[data-sum = "${res.data.product_id}"]`).textContent = res.data.summary;
                document.getElementById('summ').textContent = countSum() + " ₽";

            })
        });

        [...document.querySelectorAll('.minusProduct')].forEach((btn) => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault()
                let res = await postJson(`{{route("basket.decrease")}}`, e.target.dataset.id, 'POST', `{{ csrf_token() }}`)
                document.getElementById(res.data.product_id).textContent = res.data.amount;
                document.querySelector(`[data-sum = "${res.data.product_id}"]`).textContent = res.data.summary;
                document.getElementById('summ').textContent = countSum() + " ₽";
            })
        });

        {{--[...document.querySelectorAll('.productDelete')].forEach((btn) => {--}}
        {{--    btn.addEventListener('click', async (e) => {--}}
        {{--        console.log(2222)--}}
        {{--        e.preventDefault()--}}
        {{--        console.log( e.target.dataset.id)--}}
        {{--        let res = await postJson(`{{ route("basket.destroy") }}`, e.target.dataset.id, 'DELETE', `{{ csrf_token() }}`)--}}
        {{--        // document.getElementById(res.data.product_id).textContent = res.data.amount;--}}
        {{--        // document.querySelector(`[data-sum = "${res.data.product_id}"]`).textContent = res.data.summary;--}}
        {{--        // document.getElementById('summ').textContent = countSum() + " ₽";--}}
        {{--    })--}}
        {{--});--}}

    </script>
    <script>
        const navbarElement = document.getElementById("navbar");
        const headerElement = document.getElementById("header");
        const filterElement = document.getElementById("filters");

        window.onscroll = () => {
            let headerHeight = headerElement.clientHeight;

            console.log(window.scrollY);
            console.log(headerHeight);

            if (window.scrollY >= headerHeight) {
                console.log("yes");

                filterElement.classList.add("filter-fixed");
            } else {
                filterElement.classList.remove("filter-fixed");
            }
        };

        // console.log("hello");
    </script>
@endpush
