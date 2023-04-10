@extends('templates.app')

@section('title', 'Товар')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{$product->photo}}" class="card-img p-2" alt="{{$product->name}}" style="width: 45%">
            <div class="col-4 justify-content-end">
                <div class="m-lg-2 ">
                    <h1 class="fw-bold ff-ts">{{$product->name}} [{{$product->brand->brand}}]</h1>
                    <h2 class="fw-bold ff-ts">{{$product->price}} р.</h2>

                    <p>{{ $product->description }}</p>
                    @auth
                        <button  data-id="{{ $product->id }}"
                                 class="btn btn-outline-dark addToBasketBtn rounded-0 fs-6 ff-ts">в корзину</button>
                    @endauth
                    <p class="m-lg-2">Осталось: {{$product->count}}шт.</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center align-content-center">
            <h2 class="ff-ts"> Товары которые могут вам понравиться</h2>
        </div>

        <div class="d-flex row">
            <div class="cards">
                @forelse ((old("productCategory") ?? $productCategory) as $item)
                    <div class="card m-lg-2 rounded-0" style="width: 13rem; ">
                        <a href="{{route('products.show',$item->id)}}" class="btn  rounded-0 border-0">
                            <img src="{{$item->photo}}" class="w-100" alt="{{$item->name}}">
                        </a>
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-8">
                                        <h5 class="card-title fw-bold  ff-ts" style="font-size: 1em">{{$item->price}} руб.</h5>
{{--                                        <p class="card-title" style="font-size: 0.8em">{{$item->name}}</p>--}}
                                    </div>
{{--                                    <div class="col-4 justify-content-end">--}}
{{--                                        @auth--}}
{{--                                            <button  data-id="{{ $product->id }}"--}}
{{--                                                     class="btn btn-outline-dark addToBasketBtn rounded-0 ff-ts" style="font-size: 0.9em">в корзину</button>--}}
{{--                                        @endauth--}}
{{--                                    </div>--}}
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
            <div class="col">
                <a href="{{ route('products.thisCategory', $product->category_id) }}" class="text-decoration-none">
                    <div class="row justify-content-end ff-ts pad">
                        <div class="col-lg-1 text-black ">
                            <h5 class="fs-3">more</h5>
                        </div>
                        <div class="col-lg-2">

                            <svg width="180" height="35" viewBox="0 0 156 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 10.7714H154M154 10.7714L142.644 1M154 10.7714L142.644 19"
                                      stroke="#212529"
                                      stroke-width="1"/>
                            </svg>
                        </div>
                    </div>
                </a>
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
@endpush
