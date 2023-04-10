@extends('templates.admin_app')

@section('title', 'Создание товаров')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100 m-lg-2 ">
                <h3>Создание продукта</h3>
                <div class="form-create d-flex inp-form">
                    <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Название
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{old('name') ?? ''}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}  </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Описание
                                    </label>
                                    <textarea type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description" name="description"
                                              placeholder="">{{old('description') ?? ''}}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}  </span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Цена
                                        <input class="form-control @error('price') is-invalid @enderror" type="number"
                                               name="price" value="{{old('price') ?? ''}}">
                                        @error('price')
                                        <span class="text-danger">{{$message}}  </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Количество
                                        <input class="form-control @error('count') is-invalid @enderror" type="number"
                                               name="count" value="{{old('count') ?? ''}}">
                                        @error('count')
                                        <span class="text-danger">{{$message}}  </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Выберите категорию
                                    </label>
                                    <select class="form-select" aria-label="Выберите категорию" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{old('category') == $category->id ? 'selected': ''}}
                                            >
                                                {{$category->category}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        Выберите бренд
                                    </label>
                                    <select class="form-select " aria-label="Выберите бренд" name="brand_id">
                                        @foreach ($brands as $brand)
                                            <option
                                                value="{{$brand->id}}"
                                                {{old('brand') == $brand->id ? 'selected': ''}}
                                            >
                                                {{$brand->brand}}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Добавить картинку</label>
                                    <input class="form-control" type="file" name="photo" id="formFile">
                                    <div class="mb-3 col-8 m-lg-2" id="label"
                                         style="background-image:{{old('price') ?? ''}};  width:350px; height:350px;background-size:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('script')
    <script>
        document.getElementById("formFile").addEventListener("change", function (e) {
            if (e.target.files[0]) {
                document.getElementById("label").style.backgroundImage = `url(${URL.createObjectURL(e.target.files[0])})`
                document.getElementById("label").style.width = `350px`
                document.getElementById("label").style.height = `350px`
            }
        });
    </script>
@endpush
