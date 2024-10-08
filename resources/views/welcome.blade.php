@extends('layout.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/styles/home.css') }}">
@endsection('styles')

@section('content')
<div class="mt-4 px-3">
    <h2>Мероприятия</h2>

    <form action="{{ route('home.search') }}" method="post" class="card card-sm mt-3">
        @csrf
        <div class="row no-gutters align-items-center">
            <div class="col">
                <input name="search" class="form-control form-control form-control-borderless" type="search" placeholder="Поиск по названию или категории">
            </div>
            <div class="col-auto">
                <button class="btn btn btn-dark" type="submit">Поиск</button>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row pt-3">
            @foreach ($events as $event)
            <div class="col-lg-4 pb-5 pb-lg-4 d-flex align-items-stretch">     
                <div class="wrap text-black overflow-hidden">
                    <div class="innerdetail text-center">
                        <div class="blob"></div>
                        <h5>{{ $event->name }}</h5>
                        <img class="card-img-top img" src="{{ asset('assets/img/event.jpg') }}" alt="">
                        <div class="detail">
                            <span>{{ Illuminate\Support\Str::words($event->description, 10)  }}</span>
                        </div>
                        <div class="detail">
                            <span>Дата: {{ \Carbon\Carbon::parse($event->dateTime)->locale('ru_RU')->format('d-m-Y H:i') }}</span>
                        </div>
                        <div class="detail">
                            <span> |
                            @foreach ($event->categories as $category)
                             {{ $category['category'] . ' |' }}
                            @endforeach 
                            </span>
                        </div>
                        <form action="{{ route('user.events.subscribe', $event->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="submit" class="btn btn-secondary mt-2 align-self-end" value="Записаться"></input>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{ $events->links() }}
</div>
@endsection('content')
