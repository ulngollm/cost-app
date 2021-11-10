@extends('layout')


@section('content')
    <form class="form" data-action="cost" action="/api/income" method="post">
        <div class="form__input_group">
            <label for="name" class="form__label">Название</label>
            <input id="name" name="name" type="text" class="form__input" autofocus>
        </div>
        <div class="form__input_group">
            <label for="sum" class="form__label">Сумма</label>
            <input id="sum" name="sum" type="text" class="form__input">
        </div>
        <div class="form__input_group">
            <label for="date" class="form__label">Дата</label>
            <input id="date" name="date" type="date" class="form__input">
        </div>
        <input name="cost" type="submit" class="form__input btn" value="Отправить">
    </form>

    <script src="/js/script.js"></script>
@endsection
