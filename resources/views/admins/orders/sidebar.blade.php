<div class="row justify-content-center">
    <div class="col-4 p-md-2 row align-content-center text-center">
        <h3 class="ff-ts">Работа с заказами </h3>
    </div>
    <form action="{{route('admin.orders.filter')}}" class="col-12 row justify-content-center p-md-3">
        <div class="col-2">
            <div class="form-check row justify-content-center">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-dark rounded-0 p-0">
                        <label class="form-check-label w-100 m-1" for="all">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <input class="form-check-input" hidden="true" type="radio" name="status" id="all"
                                       value="all"
                                       onchange="this.form.submit()"
                                    {{ old("status") ? "checked" : ""}}
                                >

                                все

                            </div>
                        </label>
                    </button>
                </div>
            </div>
        </div>
        @foreach ($statuses as $status)
            <div class="col-2">
                <div class="form-check row justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-dark rounded-0">
                            <label class="form-check-label w-100" for="{{$status->id}}">
                            <input class="form-check-input" hidden="true" type="radio" name="status"
                                   id="{{$status->id}}"
                                   value="{{$status->id}}"
                                   onchange="this.form.submit()"
                                {{ old("status") == $status->id ? "checked" : ""}}
                            >

                                {{$status->status}}
                            </label>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </form>
    <hr>
</div>

