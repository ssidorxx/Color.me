@extends('templates.app')

@section('title', 'О нас')
@section('content')
    <div class="shap1 shadow">
    </div>

    <div class="container min-vh-100">
        <div class="ff-ts text-center ots1 user-select-none">
            <h2>Мы интернет-магазин салона парикмахерских услуг "Color.Me"
            </h2>
            <h4>"Все мы — это части одного большого витража"</h4>
        </div>
        <div class="ots1 user-select-none">
            <div class=" row justify-content-md-between ">
                <div class="col-5 align-items-md-center">
                    <h5 class="ff-ts text-center ">Наша история</h5>
                    <p class=" fs-6 p-lg-2  text-center"> Открытие полноценного интернет-магазина подарила салону и
                        клиентам массу возможностей. Мы загорелись идеей поделиться с вами, чем пользуемся сами. Тяжело
                        бывает сделать выбор в пользу того или иного средства, техники, потому что никогда не знаешь
                        каков результат. </p>
                    <h5 class="ff-ts text-center m-lg-2"> Но мы нашли способ решить эту проблему!</h5>
                    <p class=" fs-6 p-lg-2  text-center">
                        Наш интернет-магазин является лишь посредником, между множеством профессиональных брендов и
                        вами. Сотрудничество с многими брендами дает нам возможность открывать вам двери к полезной и
                        качественной продукции, за которую несут ответственность мировые компании.</p>

                </div>
                <div class="col-6  m-lg-4">
                    <div class="shap2">
                    </div>
                    {{--                    <image class="img-fluid" src="{{ asset('../images/qwertyu.jpg') }}"></image>--}}
                </div>
            </div>
        </div>

        <div class="ots1 user-select-none">
            <div class=" row justify-content-md-between ">
                <div class="col-6 ">
                    <div class="shap2">
                    </div>
                </div>
                <div class="col-6 align-content-start">
                    <h5 class="ff-ts text-center ">Местоположение</h5>
                    <p class=" fs-6 p-lg-2  text-center">Мы располагаемся по адресу г. Челябинск, ул Руставели, д.2.
                        Вход со стороны двора. Второй этаж, студия №207. </p>
                    <h5 class="ff-ts text-center"> Всегда рады видеть вас, ведь мы все часть единого целого!</h5>
                    <p class=" fs-6 p-lg-2  text-center"> Мы готовы работать над собой вместе с вами, поэтому мы будем
                        очень благодарны, если вы будете оставлять свои вопросы. Мы надеемся на сотрудничество.
                        Благодаря вам наш интернет-магазин становится качественнее и лучше.</p>
                </div>

            </div>
        </div>
        <div class="ots1 user-select-none ">
            <h4 class="ff-ts text-center m-lg-2">Ответы на ваши вопросы!</h4>
            <div class="accordion accordion-flush shadow" id="accordionFlushExample">
                @foreach($questions as $question)
                    @if ($question->status_id == 4)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{ $question->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{ $question->id }}" aria-expanded="false"
                                        aria-controls="flush-collapse{{ $question->id }}">
                                    <h5 class="ff-ts">{{ $question->question }}</h5>
                                </button>
                            </h2>
                            <div id="flush-collapse{{ $question->id }}" class="accordion-collapse collapse"
                                 aria-labelledby="flush-heading{{ $question->id }}"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><p class="text-md-start fs-6">{{ $question->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


    </div>
    </div>



@endsection
@push('script')
    <script>
        document.getElementById('inputCheck').addEventListener('change', (e) => {
            document.querySelector('submitForm').disabled = !e.target.checked;
        })
    </script>
@endpush


