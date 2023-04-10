@extends('templates.admin_app')

@section('title', 'Редактирование вопроса')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container min-vh-100 m-lg-2 ">
                <h3>Редактирование вопроса</h3>
                <div class="form-create ">

                    <form method="POST" action="{{route('admin.question.update', $question->id)}}">
                        @method('PATCH')
                        @csrf
                        <div class="mb-8 m-lg-2">
                            <label for="question" class="form-label"> Вопрос </label>
                            <textarea type="text" class="form-control w-100" id='question' name="question"
                                      placeholder="">{{$question->question ?? ''}}</textarea>
                            <div class="invalid-feedback">
                                Ответьте на вопрос
                            </div>
                        </div>
                        <div class="mb-8 m-lg-2">
                            <label for="answer" class="form-label"> Ответ </label>
                            <textarea class="form-control" id="answer" name="answer"
                                      placeholder="">{{$question->answer ?? ''}}</textarea>
                            <div class="invalid-feedback">
                                Ответьте на вопрос
                            </div>
                        </div>

                        <div class="mb-3 m-lg-2">
                            <label for="status" class="form-label"> Статус вопроса </label>
                            <select class="form-select" id="status" name="status_id" required
                                    aria-label="select example">
                                @foreach ($statuses as $status)
                                    <option
                                        value="{{ $status->id }}" {{ $question->status_id==$status->id ? 'selected' : '' }}>{{ $status->status }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Не забудьте изменить статус</div>
                        </div>
                        <button type="submit" class="btn btn-success m-lg-2 rounded-0" id="good-btn">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        document.getElementById('good-btn').disabled = true;

        document.getElementById('answer').addEventListener('input', (e) => {
            document.getElementById('good-btn').disabled = false;
        });
    </script>
@endpush
