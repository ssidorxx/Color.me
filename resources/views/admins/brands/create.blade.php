@extends('templates.admin_app')

@section('title', 'Добавление брендов')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100 m-lg-2 ">
                <h3>Добавление брендов</h3>
                <div class="form-create d-flex col-8">

                    <form method="POST" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
                        @csrf


                        <label class="m-lg-2" for="">
                            Название
                            <input type="text" class="form-control @error('category') is-invalid @enderror" name="brand" value="{{old('brand') ?? ''}}">

                            @error('category')
                            <span class="text-danger">{{$message}}  </span>
                            @enderror
                        </label>


                        <button type="submit" class="btn btn-secondary m-lg-2 rounded-0">Создать</button>
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
