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
        <a href="/" class="btn menu__item">Добавить расход</a>
        <a href="/income/add/" class="btn menu__item">Добавить доход</a>
        <a href="/all/" class="btn menu__item">Все расходы</a>
        <a href="/income/" class="btn menu__item">Все доходы</a>
    </nav>

</body>
</html>
