@extends('layout')


@section('content')
    <form class="form" data-action="cost" action="/api/expense" method="post">
        <div class="form__input_group">
            <label for="name" class="form__label">Название</label>
            <input id="name" name="name" type="text" class="form__input" inputmode="text" autofocus>
        </div>
        <div class="form__input_group">
            <label for="category" class="form__label">Категория</label>
            <select id="category" name="category" class="form__input" class="form__input">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form__input_group">
            <label for="count" class="form__label">Количество</label>
            <input id="count" name="quantity" type="text" class="form__input" inputmode="decimal" value='1'></div>
        <div class="form__input_group">
            <label for="price" class="form__label">Цена</label>
            <input id="price" name="sum" type="text" inputmode="decimal" class="form__input">
        </div>
        <div class="form__input_group">
            <label for="date" class="form__label">Дата</label>
            <input id="date" name="date" type="date" class="form__input">
        </div>
        <input type="submit" class="form__input btn" value="Отправить">
    </form>

    <script src="/js/script.js"></script>
@endsection
