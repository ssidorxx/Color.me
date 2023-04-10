@extends('templates.app')

@section('title', 'Каталог')
@section('content')
    <div class="shap3 shadow" id="header">
    </div>
    <div class="container min-vh-100 ots1">
        <div class="row">
            <div class="col-3 filter">
                @include('products.sidebar')
            </div>
            <div class="col-9">
                <h3 class="ff-ts">Количество товаров: {{count(old("products") ?? $products)}}</h3>
                <div class="cards">

                    @forelse ((old("products") ?? $products) as $item)
                        <div class="card m-lg-2 rounded-0 mb-2" style="width: 27rem; ">
                            <a href="{{route('products.show',$item->id)}}" class="btn  rounded-0 border-0">
                                <img src="{{$item->photo}}" class="w-100" alt="{{$item->name}}">
                            </a>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row justify-content-between">
                                        <div class="col-8">
                                            <h5 class="card-title fs-4 fw-medium  ff-ts">{{$item->price}} руб.</h5>
                                            <p class="card-title text-secondary">{{$item->name}}</p>
                                        </div>
                                        <div class="col-4 justify-content-end">
                                            @auth
                                                <button  data-id="{{ $item->id }}"
                                                   class="btn btn-outline-dark addToBasketBtn rounded-0 fs-6 ff-ts">в корзину</button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="m-lg-2">
                            <h1>Товаров в данной категории не обнаружено :(</h1>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
    <script>
        console.log(11111);
        document.querySelectorAll('.addToBasketBtn').forEach((btn) => {
            btn.addEventListener('click', async (e) => {
                console.log(344)

                await postJson('{{ route("basket.add") }}', e.target.dataset.id, 'POST', '{{ csrf_token() }}');
                {{--    await postJson('/basket/add', e.target.dataset.id, '{{ csrf_token() }}')--}}
                console.log(e.target.dataset.id)
            })
        })
    </script>

    <script>
        const navbarElement = document.getElementById("navbar");
        const headerElement = document.getElementById("header");
        const filterElement = document.getElementById("filters");

        window.onscroll = () => {
            let headerHeight = headerElement.clientHeight;

            // console.log(window.scrollY);
            // console.log(headerHeight);

            if (window.scrollY >= headerHeight) {
                // console.log("yes");

                filterElement.classList.add("filter-fixed");
            } else {
                filterElement.classList.remove("filter-fixed");
            }
        };

        // console.log("hello");
    </script>
@endpush


