@extends('templates.admin_app')

@section('title', 'Заполение категорий')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container m-lg-2 ">
                <h3>Создание категории</h3>
                <div class="form-create d-flex col-8">

                    <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="m-lg-2" for="">
                                Название
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                       name="category" value="{{old('category') ?? ''}}">

                                @error('category')
                                <span class="text-danger">{{$message}}  </span>
                                @enderror
                            </label>
                            <button type="submit" class="btn btn-secondary m-lg-2 rounded-0">Создать</button>
                        </div>
                        <div class="mb-3 m-lg-2">
                            <label for="formFile" class="form-label">Добавить картинку</label>
                            <input class="form-control" type="file" name="photo" id="formFile">
                        </div>
                        <div class="mb-3 m-lg-2 col-8" id="label"
                             style="width:500px; height:500px; background-size:100%; border: 5px dashed gainsboro;">
                        </div>


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
                document.getElementById("label").style.width = `500px`
                document.getElementById("label").style.height = `500px`
            }
        });
    </script>
@endpush
