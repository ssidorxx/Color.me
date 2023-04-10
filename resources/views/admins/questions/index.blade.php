@extends('templates.admin_app')

@section('title', 'Вопросы')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100">

                {{--                <a class="btn btn-secondary m-lg-2" href="{{route('admin.categories.create')}}">Создать категорию</a>--}}
                @include('admins.questions.sidebar')
                @include('inc.message')

                <div class="cards">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="ff-ts">#</th>
                            <th scope="col" class="ff-ts">Вопрос</th>
                            <th scope="col" class="ff-ts">Ответ</th>
                            <th scope="col" class="ff-ts">Статус</th>
                            <th scope="col" class="ff-ts">Отклонить</th>
                            <th scope="col" class="ff-ts">Редактирование</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse((old("questions") ?? $questions) as $question)

                            {{--                            @if ($question->status_id == 4)--}}
                            <tr>
                                <th scope="row">{{$question->id}}</th>
                                <td>{{$question->question}}</td>
                                <td>{{$question->answer}}</td>
                                <td>{{$question->status->status}}</td>
                                <td>
                                    @if($question->status_id !=5)
                                        <a href="{{route('admin.question.reject', $question->id)}}" class="btn btn-outline-danger rounded-0"> Отклонить </a>
                                    @else
                                        <form method="POST"
                                              action="{{route('admin.question.destroy', $question->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger rounded-0"> DELETE </button>
                                        </form>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('admin.question.edit', $question->id)}}" class="btn btn-outline-secondary rounded-0">
                                        @if ($question->status_id !=1)
                                            Редактировать
                                        @else
                                            Ответить
                                        @endif
                                    </a>


                                </td>

                            </tr>
                            {{--                            @endif--}}
                        @empty
                            <div class="m-lg-2">
                                <tr>
                                    <td>
                                        <h1>Вопросов по данному запросу не обнаружено :(</h1>
                                    </td>
                                </tr>
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{--                <ul class="nav nav-tabs" id="myTab1" role="tablist">--}}
                {{--                    <li class="nav-item" role="presentation">--}}
                {{--                        <button class="nav-link active" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab" aria-controls="new" aria-selected="true">Новые</button>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item" role="presentation">--}}
                {{--                        <button class="nav-link" id="otvet-tab" data-bs-toggle="tab" data-bs-target="#otvet" type="button" role="tab" aria-controls="otvet" aria-selected="false">Отвеченные</button>--}}
                {{--                    </li>--}}
                {{--                    <li class="nav-item" role="presentation">--}}
                {{--                        <button class="nav-link" id="otclon-tab" data-bs-toggle="tab" data-bs-target="#otclon" type="button" role="tab" aria-controls="otclon" aria-selected="false">Отклоненные</button>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}


                {{--                <div class="tab-content" id="myTabContent">--}}
                {{--                    <div class="tab-pane fade show" id="new" role="tabpanel" aria-labelledby="new-tab">--}}
                {{--                        <div class="cards">--}}
                {{--                            <table class="table table-bordered">--}}
                {{--                                <thead>--}}
                {{--                                <tr>--}}
                {{--                                    <th scope="col">#</th>--}}
                {{--                                    <th scope="col">Вопрос</th>--}}
                {{--                                    <th scope="col">Ответ</th>--}}
                {{--                                    <th scope="col">Отклоненные</th>--}}
                {{--                                    <th scope="col">Редактирование</th>--}}
                {{--                                </tr>--}}
                {{--                                </thead>--}}
                {{--                                <tbody>--}}
                {{--                                @foreach($questions as $question)--}}

                {{--                                    @if ($question->status_id == 1)--}}
                {{--                                        <tr>--}}
                {{--                                            <th scope="row">{{$question->id}}</th>--}}
                {{--                                            <td>{{$question->question}}</td>--}}
                {{--                                            <td>{{$question->answer}}</td>--}}
                {{--                                            <td>--}}
                {{--                                                <button class="btn btn-outline-danger rounded-0"> Отклонить</button>--}}
                {{--                                                --}}{{--                                <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">--}}
                {{--                                                --}}{{--                                    @csrf--}}
                {{--                                                --}}{{--                                    @method('delete')--}}
                {{--                                                --}}{{--                                    <button class="btn btn-danger"> DELETE </button>--}}
                {{--                                                --}}{{--                                </form>--}}
                {{--                                            </td>--}}
                {{--                                            <td>--}}
                {{--                                                --}}{{--                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-secondary"> UPDATE </a>--}}
                {{--                                                <a href="#" class="btn btn-outline-secondary rounded-0"> Ответить </a>--}}
                {{--                                            </td>--}}

                {{--                                        </tr>--}}
                {{--                                    @endif--}}
                {{--                                @endforeach--}}
                {{--                                </tbody>--}}
                {{--                            </table>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="tab-pane fade" id="otvet" role="tabpanel" aria-labelledby="otvet-tab">--}}
                {{--                        <div class="cards">--}}
                {{--                            <table class="table table-bordered">--}}
                {{--                                <thead>--}}
                {{--                                <tr>--}}
                {{--                                    <th scope="col">#</th>--}}
                {{--                                    <th scope="col">Вопрос</th>--}}
                {{--                                    <th scope="col">Ответ</th>--}}
                {{--                                    <th scope="col">Отклоненные</th>--}}
                {{--                                    <th scope="col">Редактирование</th>--}}
                {{--                                </tr>--}}
                {{--                                </thead>--}}
                {{--                                <tbody>--}}
                {{--                                @foreach($questions as $question)--}}

                {{--                                    @if ($question->status_id == 4)--}}
                {{--                                        <tr>--}}
                {{--                                            <th scope="row">{{$question->id}}</th>--}}
                {{--                                            <td>{{$question->question}}</td>--}}
                {{--                                            <td>{{$question->answer}}</td>--}}
                {{--                                            <td>--}}
                {{--                                                <button class="btn btn-outline-danger rounded-0"> Отклонить</button>--}}
                {{--                                                --}}{{--                                <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">--}}
                {{--                                                --}}{{--                                    @csrf--}}
                {{--                                                --}}{{--                                    @method('delete')--}}
                {{--                                                --}}{{--                                    <button class="btn btn-danger"> DELETE </button>--}}
                {{--                                                --}}{{--                                </form>--}}
                {{--                                            </td>--}}
                {{--                                            <td>--}}
                {{--                                                --}}{{--                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-secondary"> UPDATE </a>--}}
                {{--                                                <a href="#" class="btn btn-outline-secondary rounded-0"> Ответить </a>--}}
                {{--                                            </td>--}}

                {{--                                        </tr>--}}
                {{--                                    @endif--}}
                {{--                                @endforeach--}}
                {{--                                </tbody>--}}
                {{--                            </table>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="tab-pane fade" id="otclon" role="tabpanel" aria-labelledby="otclon-tab">...</div>--}}
                {{--                </div>--}}


            </div>
        </div>
    </main>
@endsection
@push('script')
    <script>
        // document.querySelector('ul[role="tablist"]').addEventListener('click', (e) => {
        //     if(document.querySelector('li[role="tab"]').active){
        //         document.querySelector('li[role="tab"]').selected = true;
        //     }
        // })

        let triggerTabList = [].slice.call(document.querySelectorAll('#myTab1 button'))
        triggerTabList.forEach(function (triggerEl) {
            let tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function (e) {
                e.preventDefault()
                tabTrigger.show()
            })
        })
        var triggerEl = document.querySelector('#myTab button[data-bs-target="#profile"]')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

        var triggerFirstTabEl = document.querySelector('#myTab li:first-child button')
        bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab
    </script>
@endpush
