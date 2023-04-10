@extends('templates.admin_app')

@section('title', 'Состав заказа')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container">
                <div class=" row">
                    <div class="col">
                        <div class="container">
                            <div class="m-lg-2 d-flex row justify-content-between">
                                <h5 class="m-lg-2">Причина отмены заказа</h5>
                                <div class="m-lg-2">
                                    {{--                                    {{ route('admin.orders.delete', $order->id) }}--}}
                                    <form method="POST" action="#">
                                        @csrf
                                        <div class="form-group rounded-0 mt-2">
                                            <label for="exampleFormControlTextarea1" class="mb-2">Укажите причину отмены
                                                заказа. Это сообщение увидит пользователь. </label>
                                            <textarea id="textareaMessage" class="form-control"
                                                      rows="3" name="comment"></textarea>
                                        </div>
                                        <button type="submit" class=" btn btn-danger rounded-0 mt-2" id="good-btn">
                                            Подтвердить
                                            отмену заказа
                                        </button>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col m-lg-2">
                        <h5 class="m-lg-2">Шаблоны для заполнения</h5>

                        <p>Здравствуйте, к сожалению товары поврежденные. Мы изменили наличие товаров, поэтому при
                            желании вы можете переоформить заказ заказав другие товары. Более подробно о причинах отмены
                            вы можете узнать в Telergam, Viber или WhatsUp по номеру 89090695515. С 10:00 ДО 19:30 </p>
                        <p>Здравствуйте, товары были доставлены не в полной комплектации, просим переоформить заказ.
                            Более подробно о причинах отмены вы можете узнать в Telergam, Viber или WhatsUp по номеру
                            89090695515. С 10:00 ДО 19:30 </p>
                        <p>Более подробно о причинах отмены вы можете узнать в Telergam, Viber или WhatsUp по номеру
                            89090695515. С 10:00 ДО 19:30 </p>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


@push('script')
    <script>
        document.getElementById('good-btn').disabled = true;

        document.getElementById('textareaMessage').addEventListener('input', (e) => {
            document.getElementById('good-btn').disabled = false;
        });
    </script>
@endpush
