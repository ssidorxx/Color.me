@extends('templates.admin_app')

@section('title', 'Бренды')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100">
                <div class="row justify-content-between">
                    <div class="col-6 p-md-3">
                        <h3 class="ff-ts">Добавление брендов</h3>
                    </div>
                    <div class="col-2">
                        <div class="row justify-content-end">
                            <a class="btn btn-outline-secondary rounded-0 m-lg-2" href="{{route('admin.brand.create')}}">Добавить бренд</a>
                        </div>
                    </div>
                    <hr>
                </div>

                @include('inc.message')
                <div class="cards m-lg-2">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="ff-ts">#</th>
                            <th scope="col" class="ff-ts">Название категории</th>
                            <th scope="col" class="ff-ts">Удаление</th>
                            <th scope="col" class="ff-ts">Редактирование</th>
{{--                            <th scope="col" class="ff-ts">Товары по категории</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brand->id }}</th>
                                <td>{{$brand->brand}}</td>
                                <td>
                                <form method="POST" action="{{route('admin.brand.destroy', $brand->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger rounded-0"> Удалить </button>
                                </form>
                                </td>
                                <td><a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-outline-secondary rounded-0"> Обновить </a></td>
{{--                                <td><a href="#" class="btn btn-outline-success rounded-0"> Посмотреть </a></td>--}}
{{--                                <td><a href="{{route('admin.categories.thisCategory', $category->id)}}" class="btn btn-success"> ТОВАРЫ </a></td>--}}
                            </tr>
                        @empty
                            <div class="m-lg-2">

                                        <h1> Пока что брендов нет :( </h1>

                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
