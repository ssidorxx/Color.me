@extends('templates.admin_app')

@section('title', 'Состав заказа')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100">

                <div class="d-flex col align-items-md-center">
                    <div class="container min-vh-100">
                        <div class="m-lg-2 d-flex row justify-content-between">
                            <h5 class="m-lg-2 ff-ts">Состав заказа № {{ $order_id }}</h5>
                            <div>
                                <div class="col-3 m-lg-2">
                                    <a class="btn btn-outline-dark rounded-0" href="{{route('admin.main')}}"> Вернуться к заказам </a>
                                </div>
                                @include('inc.message')

                                @forelse ($orderContent as $content)

                                    <div class="p-lg-2 m-lg-2 border border-dark rounded-0">
                                        <div class="d-flex row justify-content-between">

                                            <div class="col-1">
                                                <img src="{{$content->product->photo}}" class="img-fluid" alt="{{$content->product->name}}">
                                            </div>
                                            <div class="col-4">
                                                    <p class="card-title m-lg-2 ">{{$content->product->name}} </p>
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
            </div>
        </div>
    </main>

@endsection


