@extends('templates.app')

@section('title', 'Login')
@section('content')
    <main class="w-100 ">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
            <div class="container reg ">
                <h3 class="ff-ts  border-bottom">Регистрация</h3>
                <form method="POST" action="{{route('users.store')}}" class="align-content-center p-lg-4 shadow " style="background-color:rgb(254,254,254);">
                    @csrf
                    <div class="form-group rounded-0">
                        <label for="inputName" class="ff-ts">Имя</label>
                        <input type="text" class="form-control rounded-0  @error('name') is-invalid @enderror" id="inputName"
                               name='name' value="{{old('name')}}" placeholder="Иван">
                        <p class="text-secondary plc"> русские буквы, пробел</p>
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}} </span>
                    @enderror


                    <div class="form-group col-md-6">
                        <label for="inputLogin" class="ff-ts">Логин </label>
                        <input type="text" class="form-control rounded-0 @error('login') is-invalid @enderror" name='login'
                               value="{{old('login')}}" id="inputLogin" placeholder="Login">
                        <p class="text-secondary plc">латинские буквы, пробел, -</p>
                    </div>
                    @error('login')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group col-md-6">
                        <label for="inputEmail" class="ff-ts">Email</label>
                        <input type="email" class="form-control rounded-0  @error('email') is-invalid @enderror" id="inputEmail"
                               name='email' value="{{old('email')}}" placeholder="Email">
                        <p> </p>

                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputPassword" class="ff-ts">Пароль</label>
                            <input type="password" class="form-control rounded-0  @error('password') is-invalid @enderror"
                                   id="inputPassword" name="password" placeholder="Password">
                            <p class="text-secondary plc ">не менее 6 символов, латинские буквы, цифры, пробел, -</p>
                        </div>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group col-md-6">
                            <label for="inputPassword2" class="ff-ts">Повторите пароль</label>
                            <input type="password"
                                   class="form-control  rounded-0  @error('password_confirmation') is-invalid @enderror"
                                   id="inputPassword2" placeholder="Password" name="password_confirmation">
                            <p> </p>
                        </div>
                        @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 offset-md-1">
                            <button  id='submitForm' class=" text fw-weight-bolder btn btn-outline-dark rounded-0">Зарегистрироваться</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </main>
            @endsection

            @push('script')
            @endpush


