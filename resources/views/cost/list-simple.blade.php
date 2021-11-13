@extends('layout')

@section('content')
    <div class="table">
        <div class="table__row table__row_head">
            <div class="table__cell">Название</div>
            <div class="table__cell">Категория</div>
            <div class="table__cell">Количество</div>
            <div class="table__cell">Цена</div>
        </div>
            @foreach ($expenses as $item)
                <div class="table__row" id="{{$item->id}}">
                    <div class="table__cell">{{$item->name}}</div>
                    <div class="table__cell">{{$item->category}}</div>
                    <div class="table__cell">{{$item->quantity}}</div>
                    <div class="table__cell">{{$item->sum}}</div>
                </div>
            @endforeach
            {{$expenses->links()}}
        </div>
        <pre>
            {{-- {{print_r($expenses->items()->groupBy('date'))}} --}}
        </pre>
@endsection
