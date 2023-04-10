@extends('templates.app')

@section('title', 'Авторизация')
@section('content')
    <div class="container reg">
        <h3 class="ff-ts  border-bottom">Авторизация Администратора</h3>
        <form method="POST" action="{{route('admin.login.check')}}" class=" p-lg-4 shadow "
              style="background-color:rgb(254,254,254);">
            @csrf
            <div class="form-group col-md-6 m-lg-2">
                <label for="inputLogin" class="ff-ts">Login</label>
                <input type="text" class="form-control rounded-0 @error('login') is-invalid @enderror" name='login'
                       value="{{old('login')}}" id="inputLogin" placeholder="Login">
                <p></p>
            </div>
            @error('login')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-row">
                <div class="form-group col-md-6 m-lg-2">
                    <label for="inputPassword" class="ff-ts">Пароль</label>
                    <input type="password" class="form-control rounded-0 @error('password') is-invalid @enderror"
                           id="inputPassword" name="password" placeholder="Password">
                    <p></p>
                </div>
                @error('errorLogin')
                <span class="alert alert-danger" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="row justify-content-center m-lg-2">
                <div class="col-md-6 offset-md-1 ">
                    <button type="submit" id='submitForm' class="text fw-weight-bolder btn btn-outline-dark rounded-0">
                        Авторизоваться
                    </button>
                </div>

            </div>
        </form>
    </div>



    @push('script')
        <script>
            document.getElementById('inputCheck').addEventListener('change', (e) => {
                document.querySelector('submitForm').disabled = !e.target.checked;
            })
        </script>
    @endpush


@endsection
