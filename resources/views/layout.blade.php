<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'title'}}</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @yield('content')

    <nav class="menu">
        {{-- https://qna.habr.com/q/610938 --}}
        <a href="{{ route('cost.add') }}" class="btn menu__item {{ request()->routeIs('cost.add') ? 'menu__item_active' : '' }}">Добавить расход</a>
        <a href="{{ route('income.add') }}" class="btn menu__item {{ request()->routeIs('income.add') ? 'menu__item_active' : '' }}">Добавить доход</a>
        <a href="{{ route('cost.list') }}" class="btn menu__item {{ request()->routeIs('cost.list') ? 'menu__item_active' : '' }}">Все расходы</a>
        <a href="{{ route('income.list') }}" class="btn menu__item {{ request()->routeIs('income.list') ? 'menu__item_active' : '' }}">Все доходы</a>
    </nav>

</body>
</html>
