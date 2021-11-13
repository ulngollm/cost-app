@extends('layout')

@section('content')
    <div class="table">
        <div class="table__row table__row_head">
            <div class="table__cell">Название</div>
            <div class="table__cell">Сумма</div>
            <div class="table__cell">Дата</div>
        </div>
        {{$incomes->onEachSide(1)->links()}}
        @foreach ($incomes as $item)
            <div class="table__row" id="{{$item->id}}">
                <div class="table__cell">{{$item->name}}</div>
                <div class="table__cell">{{$item->sum}}</div>
                <div class="table__cell">{{$item->date}}</div>
            </div>
        @endforeach
    </div>
@endsection
