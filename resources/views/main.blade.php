@extends('templates.app')

@section('title', 'Главная')
@section('content')
    <meta name="author" content="Паюсова Анна" />

    <meta name="description" content='Интернет-магазин для компании "Color.Me" представляет собой уникальную идею продажи тех товаров, которые используются в данном салоне. Множество людей не знают, что выбрать из уходовых средств, наш сайт помогает решить им данную проблему!' />

    <meta name="document-state" content="Dynamic" />
    <div class="shap shadow">
    </div>
    <div class="position-relative">
        <div class="blok-abc">
            <div class="row ff-ts  justify-content-md-center">
                <div class="col col-lg-2"><h5>Категории</h5></div>
                <div class="col col-lg-6 ">
                    <div class="row justify-content-end">
                        <a href="{{ route('products.index') }}" class="text-decoration-none">
                            <div class="row justify-content-end ff-ts pad">
                                <div class="col-lg-2 text-black">
                                    <h5>more</h5>
                                </div>
                                <div class="col-lg-3">

                                    <svg width="150" height="20" viewBox="0 0 156 20" fill="none"
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
            <div class='m-lg-2 row  justify-content-md-center'>

                @foreach($categories as $category)

                    <div class="position-relative crd" style="width: 20rem; height: 20rem;">
                        <a href="{{ route('products.thisCategory', $category->id) }}" class="ahov">
                            <div class=" pos-name-category  ff-ts" style="width: 18.5rem; ">
                                <h4 class="text-shadow"><b>{{ $category -> category }}</b></h4>
                            </div>
                            <img src="{{ $category -> photo }}" class="img-fluid"
                                 alt="{{ $category -> category }}">

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container min-vh-100">

        <div class="ff-ts text-center ots user-select-none">
            <h2>В нашем магазине вы можете купить продукцию, которую используют в салоне «Color.me»
            </h2>
            <h4>
                Так же вы сможете приобрести профессиональные или потребительские технические инструменты для домашнего
                использования. </h4>
        </div>
        <div class="ots1 user-select-none">
            <div class=" row justify-content-md-between ">
                <div class="col-5 ">
                    <h4 class="ff-ts text-center m-lg-2">Ответы на вопросы, которые у вас могут возникнуть</h4>
                    @foreach($questions as $question)
                        <h5>{{ $question->question }}</h5>
                        <p class="text-md-start fs-6">{{ $question->answer }}</p>
                    @endforeach
                    <a href="{{ route('about') }}" class=" text-decoration-none">
                        <div class="row justify-content-end ff-ts pad">

                            <div class="col-lg-2 text-black">
                                <h5>more</h5>
                            </div>
                            <div class="col-lg-3">

                                <svg width="150" height="20" viewBox="0 0 156 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 10.7714H154M154 10.7714L142.644 1M154 10.7714L142.644 19"
                                          stroke="#212529"
                                          stroke-width="1"/>
                                </svg>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-6  m-lg-2">
                    <image class="img-fluid" src="{{ asset('../images/sssss.jpg') }}"></image>
                </div>
            </div>
        </div>
        @auth
            <div class="ots1 w-100 d-flex flex-column align-items-md-center justify-content-center">

                <form method="post" action="{{ route('question.store') }}"
                      class=" p-lg-4 shadow w-75 d-flex flex-column align-items-md-center "
                      style="background-color:rgb(254,254,254);">
                    @csrf
                    <h3 class="ff-ts border-bottom">Задайте нам вопрос</h3>
                    <div class="text-center" style="margin-top: 1em;">
                        <p>Здесь вы можете задать нам общий вопрос касательно товаров, их качества, лицензий и любые
                            другие вопросы, которые могут возникнуть к нашему интернет-магазину.</p>
                    </div>
                    @include('inc.message')
                    <div class="row">
                        <div class="form-group col-md-12 m-lg-2">
                            <input type="text" class="form-control rounded-0" id="inputQuestion" name="question"
                                   placeholder="Какой вопрос я могу задать?">
                            <p></p>
                        </div>
                        <div class="d-flex flex-column m-lg-2">

                            <button type="submit" id='submitForm'
                                    class="text fs-6 fw-weight-bolder btn btn-outline-dark rounded-0" id>Задать вопрос
                            </button>
                        </div>
                    </div>
                    <div class="text-center text-secondary plc" style="margin-top: 1em;">
                        <p>Вопросы личного характера, которые связанны конкретно с вашим заказом или с вашей
                            индивидуальной ситуацией <b>будут проигнорированы</b>, так как ответы на эти вопросы уйдут в
                            раздел "О нас", чтобы решать <b>общие проблемы</b> пользователей</p>
                    </div>
                </form>
            </div>

        @endauth
    </div>
@endsection
@push('script')
    <script>
        document.getElementById('submitForm').disabled = true;

        document.getElementById('inputQuestion').addEventListener('input', (e) => {
            document.getElementById('submitForm').disabled = false;
        });
    </script>
@endpush


