<div class="container m-lg-2 filter-container ots1" id="filters">

    <form action="{{route('products.filter')}}">

        <div class="container d-flex">
            <br>
            <div class="mb-2">
                <h4 class="sticky-md-top ff-ts ">Сортировка по </h4>
                <select name="sortSelected" class="form-select rounded-0">
                    <option value="desc"
                        {{ old("sortSelected") == 'desc' ? "checked" : ""}}
                    >
                        Убыванию
                    </option>
                    <option value="asc"
                        {{ old("sortSelected") == 'asc' ? "checked" : ""}}
                    >
                        Возрастанию
                    </option>
                </select>
            </div>
        </div>
        <div class="form-check m-lg-2 mb-2">
            <input class="form-check-input" type="radio" name="sorts" id="price"
                   value="price"
                {{ old("sorts") == 'price' ? "checked" : ""}}
            >
            <label class="form-check-label ff-ts" for="price">
                Цена
            </label>
        </div>

        <h4 class="ff-ts">Фильтр по категориям</h4>
        @foreach ($categories as $category)
            <div class="form-check m-lg-2">
                <input class="form-check-input rounded-0" type="checkbox" name="category[]"
                       id="category_{{$category->id}}"
                       value="{{$category->id}}"

                    {{ in_array($category->id, old("category") ?? []) ? "checked" : ""}}
                >
                <label class="form-check-label " for="category_{{$category->id}}">
                    {{$category->category}}
                </label>
            </div>
        @endforeach

        <h4 class="ff-ts">Фильтр по брендам</h4>
        @foreach ($brands as $brand)
            <div class="form-check m-lg-2">
                <input class="form-check-input rounded-0" type="checkbox" name="brand[]" id="brand_{{$brand->id}}"
                       value="{{$brand->id}}"

                    {{ in_array($brand->id, old("brand") ?? []) ? "checked" : ""}}
                >
                <label class="form-check-label" for="brand_{{$brand->id}}">
                    {{$brand->brand}}
                </label>
            </div>
        @endforeach
        <button class="btn btn-dark rounded-0"> Отфильтровать</button>
    </form>
</div>


