@extends('layouts.superAdmin')

@section('title', $timeline->name)

@section('content')

    <div>
        {{$exceptionDays}}
    </div>

    <br>
    <br>

    <div>
        @foreach ($diasDoMes as $item)
        <br>
            {{var_dump($item['day'])}}
            {{var_dump($item['weekDayPtBr'])}}
            {{var_dump($item['nonWork'])}}

            @if (array_key_exists('reason', $item))
                {{var_dump($item['reason'])}}
            @endif
        @endforeach
    </div>

@endsection