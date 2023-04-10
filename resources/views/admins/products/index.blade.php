@extends('templates.admin_app')

@section('title', 'Товары')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100">
                <div class="container min-vh-100">
                    <div class="row justify-content-between">
                        <div class="col-6 p-md-3">
                            <h3 class="ff-ts">Создание товаров</h3>
                        </div>
                        <div class="col-2">
                            <div class="row justify-content-end">
                                <a class="btn btn-outline-secondary rounded-0 m-lg-2"
                                   href="{{route('admin.product.create')}}">Создать товар</a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    @include('inc.message')
                    <tr class="cards">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="ff-ts">#</th>

                                <th scope="col" class="ff-ts"></th>
                                <th scope="col" class="ff-ts">Название</th>
                                <th scope="col" class="ff-ts">Цена</th>
                                <th scope="col" class="ff-ts">Бренд</th>
                                <th scope="col" class="ff-ts">Количество</th>
                                <th scope="col" class="ff-ts">Категория</th>
                                <th scope="col" class="ff-ts">Удалить</th>
                                <th scope="col" class="ff-ts">Изменить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ((old("products") ?? $products) as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td class="col-1">
                                        <img src="{{$item->photo}}" class="img-fluid" alt="">
                                    </td>
                                    <td class="col-3">{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->brand->brand}}</td>
                                    <td class="text-center">{{$item->count}}</td>
                                    <td>{{$item->category->category}}</td>
                                    <td>
                                        <div class="mb-2">
                                            <form method="POST" action="{{route('admin.product.destroy', $item->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger rounded-0"> Удалить</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <a href="{{route('admin.product.edit', $item->id)}}"
                                               class="btn btn-outline-secondary rounded-0">
                                                Изменить</a>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <div class="m-lg-2">
                                    <h1>Товаров не ещё нет :(</h1>
                                </div>
                            @endforelse
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </main>
@endsection
