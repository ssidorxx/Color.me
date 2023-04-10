@extends('templates.admin_app')

@section('title', 'Редактирование товаров')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100 m-lg-2 ">
                <h3>Редактирование продукта</h3>
                <div class="form-create d-flex inp-form">
                    <form method="POST" action="{{route('admin.product.update', $product->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">
                                        Название
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{$product->name ?? ''}}">
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
                                              placeholder="">{{$product->description ?? ''}}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}  </span>
                                    @enderror

                                </div>
                                <div class="mb-3">

                                    <label for="">
                                        Цена
                                        <input class="form-control @error('price') is-invalid @enderror" type="number"
                                               name="price" value="{{$product->price ?? ''}}">
                                        @error('price')
                                        <span class="text-danger">{{$message}}  </span>
                                        @enderror
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="">
                                        Количество
                                        <input class="form-control @error('count') is-invalid @enderror" type="number"
                                               name="count" value="{{$product->count ?? ''}}">
                                        @error('count')
                                        <span class="text-danger">{{$message}}  </span>
                                        @enderror
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <select class="form-select" aria-label="Выберите категорию" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{ $product->category_id == $category->id ? 'selected': ''}}
                                            >
                                                {{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Выберите страну" name="brand_id">
                                        @foreach ($brands as $brand)
                                            <option
                                                value="{{$brand->id}}"
                                                {{$product->brand_id == $brand->id ? 'selected': ''}}
                                            >
                                                {{$brand->brand}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Обновить картинку</label>
                                    <input class="form-control" type="file" name="photo" id="formFile">
                                    <div class="mb-3 col-8 m-lg-2" id="label"
                                         style="background-image:url('{{ $product->photo }}');  width:350px; height:350px; background-size:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Обновить</button>

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
                document.getElementById("label").style.backgroundSize = `100%`
            }
        });
    </script>
@endpush
