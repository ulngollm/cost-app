@extends('layout')

@section('content')
<div class="table">
    <div class="table__row table__row_head">
        <div class="table__cell">Название</div>
        <div class="table__cell">Категория</div>
        <div class="table__cell">Количество</div>
        <div class="table__cell">Цена</div>
    </div>
    {{$expenses->onEachSide(1)->links()}}
        @foreach ($groups as $key => $group)
            <div class="table__row table__row_section">
                <div class="table__cell">{{$key}}</div>
                <div class="table__cell">₽</div>
            </div>
            @foreach ($group as $item)
                <div class="table__row" id="{{$item->id}}">
                    <div class="table__cell">{{$item->name}}</div>
                    <div class="table__cell">{{$item->category}}</div>
                    <div class="table__cell">{{$item->quantity}}</div>
                    <div class="table__cell">{{$item->sum}}</div>
                </div>
            @endforeach
        @endforeach

        </div>
@endsection
